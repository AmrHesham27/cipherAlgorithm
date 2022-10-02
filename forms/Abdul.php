<?php

require '../controllers/Abdul.php';

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

if( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['abdul_type'] == 'E' ) {
    if( 
        $_POST['message'] != '' 
        && $_POST['key'] != '' 
    ) {
        // refuse numbers, spaces and special letters
        if(!ctype_alpha($_POST['message']) || !ctype_alpha($_POST['key'])){
            $message = 'Please enter only letters a-z';
            $status_array = array( 
                'data' => null,
                'status' => 'false', 
                'message' => $message
            );
            echo json_encode($status_array);
        }

        else {
            // if a letter is equal to J make it I 
            $message = strtoupper($_POST['message']);
            $message = str_replace('J', 'I', $message);

            // encrypt
            $abdul = new Abdul;
            $result = $abdul->encrypt($message, $_POST['key']);
            sendResponse($result);
        }   
    }
    else {
        $status_array = array( 
            'status' => 'false', 
            'message' => 'Message and key are required'
        );
        echo json_encode($status_array);
    }
}

elseif( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['abdul_type'] == 'D'  ) {
    if( 
        $_POST['message'] != '' 
        && $_POST['key'] != '' 
    ) {
        // refuse numbers, spaces and special letters
        if(!ctype_alpha($_POST['message']) || !ctype_alpha($_POST['key'])){
            $message = 'Please enter only letters a-z';
            $status_array = array( 
                'data' => null,
                'status' => 'false', 
                'message' => $message
            );
            echo json_encode($status_array);
        }

        else {
            // if a letter is equal to J make it I 
            $message = strtoupper($_POST['message']);
            $message = str_replace('J', 'I', $message);

            // encrypt
            $abdul = new Abdul;
            $result = $abdul->decrypt($_POST['message'], $_POST['key']);
            sendResponse($result);
        }   
    }
    else {
        $status_array = array( 
            'status' => 'false', 
            'message' => 'Message and key are required'
        );
        echo json_encode($status_array);
    }
}
?>