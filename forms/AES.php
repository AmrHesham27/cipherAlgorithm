<?php

require '../controllers/AES.php';


if( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['aes_type'] == 'E' ) {
    if( 
        $_POST['message'] != '' 
        && $_POST['key'] != '' 
    ) { 
        // encrypt
        $new_AES = new AES();
        $cipherText = $new_AES->encrypt($_POST['message'], $_POST['key']);

        // return
        $status_array = array( 
            'data' => $cipherText, 
            'status' => 'true', 
            'message' => 'Your message was encrypted successfully!'
        );
        echo json_encode($status_array);
    }
    else {
        $status_array = array( 
            'status' => 'false', 
            'message' => 'Message and key are required'
        );
        echo json_encode($status_array);
    }
}

elseif( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['aes_type'] == 'D'  ) {
    if( 
        $_POST['message'] != '' 
        && $_POST['key'] != '' 
    ) {
        // encrypt
        $new_AES = new AES();
        $cipherText = $new_AES->decrypt($_POST['message'], $_POST['key']);

        // return
        $status_array = array( 
            'data' => $cipherText, 
            'status' => 'true', 
            'message' => 'Your message was decrypted successfully'
        );
        echo json_encode($status_array);
    }
    else {
        $status_array = array( 
            'status' => 'false', 
            'message' => 'Message and key are required'
        );
        echo json_encode($status_array);
    }
};
?>