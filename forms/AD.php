<?php

require '../controllers/AD.php';


if( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['ad_type'] == 'E' ) {
    if( 
        $_POST['message'] != '' 
    ) {
        // refuse numbers, spaces and special letters
        if(!ctype_alpha($_POST['message'])){
            $status_array = array( 
                'data' => null,
                'status' => 'false', 
                'message' => 'Please enter only letters a-z'
            );
            echo json_encode($status_array);
        }

        else {
            // encrypt
            $new_AD = new AD();
            $cipherText = $new_AD->encrypt($_POST['message']);

            // return
            $status_array = array( 
                'data' => $cipherText, 
                'status' => 'true', 
                'message' => 'Your message was encrypted successfully!'
            );
            echo json_encode($status_array);
        }   
    }
    else {
        $status_array = array( 
            'status' => 'false', 
            'message' => 'Message is required'
        );
        echo json_encode($status_array);
    }
}

elseif( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['ad_type'] == 'D'  ) {
    if( 
        $_POST['message'] != ''
    ) {
        // decrypt
        $new_AD = new AD();
        $cipherText = $new_AD->decrypt($_POST['message']);

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
            'message' => 'Message is required'
        );
        echo json_encode($status_array);
    }
};
?>