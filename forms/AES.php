<?php

require '../controllers/AES.php';

/* $_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['aes_type'] = 'E';
$_POST['message'] = 'UAGZ';
$_POST['key'] = 'food'; */

/* $_SERVER['REQUEST_METHOD'] = 'POST';
$_POST['aes_type'] = 'D';
$_POST['message'] = '%C1xcJB%26%CA%3B%7D%82%3D5%D1m%9B%C9%5E%A6%F7%C2%DA%B0%5D%FDk%A4e%26%88%BD%F79%A6%9E%FD_%EF%19%2A%1D%07%1BF%D27%E7%7Bh%E8%12%0Ci%19%EA%94%83%00%80%7C_%40%5EKe';
$_POST['key'] = 'food'; */

if( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['aes_type'] == 'E' ) {
    if( 
        $_POST['message'] != '' 
        && $_POST['key'] != '' 
    ) { 
        // encrypt
        $new_AES = new AES();
        $result = $new_AES->encrypt($_POST['message'], $_POST['key']);

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
                'status' => 'false', 
                'message' => $result['message']
            );
            echo json_encode($status_array);
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

elseif( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['aes_type'] == 'D'  ) {
    if( 
        $_POST['message'] != '' 
        && $_POST['key'] != '' 
    ) {
        // encrypt
        $new_AES = new AES();
        $result = $new_AES->decrypt($_POST['message'], $_POST['key']);

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
                'status' => 'false', 
                'message' => $result['message']
            );
            echo json_encode($status_array);
        }
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