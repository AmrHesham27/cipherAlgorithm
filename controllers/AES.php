<?php

class AES {
    public $method = "AES-256-CBC";

    function encrypt($plaintext, $password) {
        $password = strtoupper(trim($password));
        
        $key = hash('sha256', $password, true);
        $iv = openssl_random_pseudo_bytes(16);
    
        $ciphertext = openssl_encrypt($plaintext, $this->method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
        
        $result = urlencode($iv . $hash . $ciphertext);

        return array( 
            'data' => $result, 
            'status' => 'true', 
            'message' => 'Your message was encrypted successfully!'
        );
    }
    
    function decrypt($ivHashCiphertext, $password) {
        $password = strtoupper(trim($password));

        $ivHashCiphertext = urldecode($ivHashCiphertext);
        $iv = substr($ivHashCiphertext, 0, 16);
        $hash = substr($ivHashCiphertext, 16, 32);
        $ciphertext = substr($ivHashCiphertext, 48);
        $key = hash('sha256', $password, true);
    
        if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) {    
            return array( 
                'status' => 'false', 
                'message' => 'This cipher was not encrypted with AES algorithm!'
            );
        }
    
        $result = openssl_decrypt($ciphertext, $this->method, $key, OPENSSL_RAW_DATA, $iv);

        return array( 
            'data' => $result, 
            'status' => 'true', 
            'message' => 'Your message was decrypted successfully!'
        );
    }
}

/* $AES_algorithm = new AES();

//print_r($AES_algorithm->encrypt('UAGZ', 'food'));

print_r($AES_algorithm->decrypt('%C1xcJB%26%CA%3B%7D%82%3D5%D1m%9B%C9%5E%A6%F7%C2%DA%B0%5D%FDk%A4e%26%88%BD%F79%A6%9E%FD_%EF%19%2A%1D%07%1BF%D27%E7%7Bh%E8%12%0Ci%19%EA%94%83%00%80%7C_%40%5EKe', 'food')) */

?>