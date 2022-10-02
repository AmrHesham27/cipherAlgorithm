<?php

require '../controllers/AD.php';

function sendResponse ($result) {
    if($result['status'] == 'true'){
        $status_array = array( 
            'data' => $result['data'], 
            'status' => 'true', 
            'message' => 'Your message was encrypted successfully!'
        );
        echo json_encode($status_array);
    }
    else {
        $status_array = array( 
            'message' => $result['message'], 
            'status' => 'false'
        );
        echo json_encode($status_array);
    }            
}

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
            $result = $new_AD->encrypt($_POST['message']);
            sendResponse($result);
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
        $new_AD = new AD();
        // check message is valid for decryption 
        for($i=0; $i < strlen($_POST['message']); $i++){
            if( $i%2 == 0 ){
                $hex_value = $_POST['message'][$i] . $_POST['message'][$i + 1];
                $result = array_search($hex_value, $new_AD->Hex);
                if($result) { continue; }
                else {
                    $status_array = array( 
                        'status' => 'false', 
                        'message' => 'Please enter valid code!'
                    );
                    echo json_encode($status_array);
                    return; 
                }
            }
        };

        // decrypt
        $result = $new_AD->decrypt($_POST['message']);
        sendResponse($result);
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