<?php

require '../controllers/T&M.php';

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

/* // for test 
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['tm_type'] = 'E';
$_POST['message'] = 'Ali';
$_POST['abdul_key'] = 'Food';
$_POST['aes_key'] = 'Food'; */

if( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['tm_type'] == 'E' ) {
    if( 
        $_POST['message'] != ''
        && $_POST['abdul_key'] != ''
        && $_POST['aes_key'] != ''
    ) {
        // refuse numbers, spaces and special letters
        if(!ctype_alpha($_POST['message'])){
            $message = 'Please enter only letters a-z in message';
            $status_array = array( 
                'data' => null,
                'status' => 'false', 
                'message' => $message
            );
            echo json_encode($status_array);
        }

        elseif(!ctype_alpha($_POST['abdul_key'])){
            $message = 'Please enter only letters a-z in Abdulrahman key';
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
            $new_T_M = new T_M();
            $result = $new_T_M->encrypt($message, $_POST['abdul_key'], $_POST['aes_key']);
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

elseif( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['tm_type'] == 'D'  ) {
    if( 
        $_POST['message'] != '' 
        || $_POST['abdul_key'] != ''
        || $_POST['aes_key'] != '' 
    ) {
        // decrypt
        $new_T_M = new T_M();
        $result = $new_T_M->decrypt($_POST['message'], $_POST['abdul_key'], $_POST['aes_key']);
        sendResponse($result);
    }
    else {
        $status_array = array( 
            'status' => 'false', 
            'message' => 'Message and key are required'
        );
        echo json_encode($status_array);
    }
}

else {
    $status_array = array( 
        'status' => 'false', 
        'message' => 'Error happened!'
    );
    echo json_encode($status_array);
}

?>