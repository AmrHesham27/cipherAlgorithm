<?php

class AES {
    public $method = "AES-256-CBC";

    function encrypt($plaintext, $password) {
        $key = hash('sha256', $password, true);
        $iv = openssl_random_pseudo_bytes(16);
    
        $ciphertext = openssl_encrypt($plaintext, $this->method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
        
        return urlencode($iv . $hash . $ciphertext);
    }
    
    function decrypt($ivHashCiphertext, $password) {
        $ivHashCiphertext = urldecode($ivHashCiphertext);
        $iv = substr($ivHashCiphertext, 0, 16);
        $hash = substr($ivHashCiphertext, 16, 32);
        $ciphertext = substr($ivHashCiphertext, 48);
        $key = hash('sha256', $password, true);
    
        if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return 'invalid';
    
        return openssl_decrypt($ciphertext, $this->method, $key, OPENSSL_RAW_DATA, $iv);
    }
}

/* $AES_algorithm = new AES();

//echo $AES_algorithm->encrypt('UAGZ', 'food');

echo $AES_algorithm->decrypt('n%DA5%BBN%BBh5%E9%98e%BAFs%26%23%AB%23%1AH%BD%97n%93%80A%8F%F5pb%937%F6%E4%D2%C3%0C%D7%23%99%C9%14X%E8%03%D5Ca%B0h%DF%95%D7%3BX%00%93%07%9DT%ACj%CF1', 'food') */

?>