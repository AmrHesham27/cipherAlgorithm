<?php

require '../controllers/Abdul.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( 
        $_POST['message'] != '' 
        && $_POST['key'] != '' 
    ) {
        // refuse numbers, spaces and special letters
        if(!ctype_alpha($_POST['message'])){
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
            $message = str_split(strtoupper($_POST['message']));
            $J_index = array_search('J', $message);
            if($J_index){
                $message[$J_index] = 'I';
            };
            $newMessage = '';
            foreach($message as $letter){
                $newMessage = $newMessage . $letter;
            };

            // encrypt
            $abdul = new Abdul;
            $cipherText = $abdul->encrypt($_POST['message'], $_POST['key']);
            $message = 'Your message was encrypted successfully!';

            // return
            $status_array = array( 
                'data' => $cipherText, 
                'status' => 'true', 
                'message' => $message
            );
            echo json_encode($status_array);
        }   
    }
};
?>