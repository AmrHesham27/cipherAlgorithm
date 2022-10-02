<?php

require_once __DIR__.'/Abdul.php';
require_once __DIR__.'/AES.php';
require_once __DIR__.'/AD.php';

class T_M {
    public $Abdul;
    public $AES;
    public $AD;

    public function __construct () {
        $this->Abdul = new Abdul();
        $this->AES = new AES();
        $this->AD = new AD();
    }

    public function encrypt($message, $abdul_key, $aes_key) {
        $abdul_cipher = $this->Abdul->encrypt($message, $abdul_key);
        if($abdul_cipher['status'] == 'false') {
            return array(
                'status' => 'false', 
                'message' => $abdul_cipher['message']
            );
        }

        $ad_cipher = $this->AD->encrypt($abdul_cipher['data']);
        if($ad_cipher['status'] == 'false') {
            return array(
                'status' => 'false',
                'message' => $ad_cipher['message']
            );
        }
        
        $aes_cipher = $this->AES->encrypt($ad_cipher['data'], $aes_key);
        if($aes_cipher['status'] == 'false') {
            return array(
                'status' => 'false',
                'message' => $aes_cipher['message']
            );
        }

        return $aes_cipher;
    }

    public function decrypt($message, $abdul_key, $aes_key) {
        $aes_text = $this->AES->decrypt($message, $aes_key);
        if($aes_text['status'] == 'false') {
            return array(
                'status' => 'false',
                'message' => $aes_text['message']
            );
        }

        $ad_text = $this->AD->decrypt($aes_text['data']);
        if($aes_text['status'] == 'false') {
            return array(
                'status' => 'false',
                'message' => $aes_text['message']
            );
        }

        $abdul_text = $this->Abdul->decrypt($ad_text['data'], $abdul_key);
        if($abdul_text['status'] == 'false') {
            return array(
                'status' => 'false',
                'message' => $abdul_text['message']
            );
        }

        return $abdul_text;
    }
}

/* $new_T_M = new T_M();
print_r($new_T_M->encrypt('amr', 'food', 'food'));
print_r($new_T_M->decrypt(
    'cU%CA%87%ED%80%E8%9Dg%0ByN%E5%CE%90%13%95%F3%D7hH%26%AEq%CA%9D%1E%0F%01%B6v%B9%0A%F4%7E%7C%FB%CA%7D%9D%B7%12%C3f%40uPDG%B6M%E7e%A7%09%AD%9BE%B2%8A+%F6w%C1', 
    'food'
)); */ 


?>