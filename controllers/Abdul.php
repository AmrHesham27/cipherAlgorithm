<?php

    class Abdul {
        public $message;
        public $key;
        public $letters_table = array();
        public $letters_array;
        public $x_key;
        public $y_key;

        function setValues ($message, $key) {
            $this->message = $message;
            $this->key = $key;
        }

        function setTable () {
            $this->key = array_unique(str_split(strtoupper($this->key))); 
            $all_letters = array();
            foreach($this->key as $letter){
                array_push($all_letters, $letter);
            };
            foreach( range('A', 'Z') as $letter) {
                if(!in_array($letter, $this->key) && $letter != 'J'){
                    array_push($all_letters, $letter);
                }
                else {
                    continue;
                }
            };
            $index=0;
            for($x=0; $x<5; $x++){
                $this->letters_table[$x] = array();
                for($y=$index;  $y<($index + 5);  $y++){
                    array_push($this->letters_table[$x], $all_letters[$y]);
                };
                $index += 5;
            };
            $this->letters_array = array_merge(
                $this->letters_table[0], 
                $this->letters_table[1], 
                $this->letters_table[2], 
                $this->letters_table[3], 
                $this->letters_table[4]
            );
        }

        function handleMessage() {
            $this->message = str_split(strtoupper($this->message));
        }

        function get_Y_and_X ($letter) {
            $array_index = array_search($letter, $this->letters_array);
            switch (true) {
                case ($array_index < 5) :
                    $this->y_key = 0;
                    break;
                case ($array_index > 4) && ($array_index <= 9):
                    $this->y_key = 1;
                    break;
                case ($array_index > 9) && ($array_index <= 14):
                    $this->y_key = 2;
                    break;
                case ($array_index > 14) && ($array_index <= 19):
                    $this->y_key = 3;
                    break;
                case ($array_index > 19) && ($array_index <= 24):
                    $this->y_key = 4;
                    break;
            };
            $this->x_key = array_search($letter, $this->letters_table[$this->y_key]);
        }

        function encryptOneLetter ($letter) {
            $this->y_key -= 2;
            if($this->y_key < 0){$this->y_key += 5;};

            $this->x_key += 1;
            if($this->x_key > 4){$this->x_key -= 5;};

            return $this->letters_table[$this->y_key][$this->x_key];
        }

        function decryptOneLetter ($letter) {
            $this->y_key += 2;
            if($this->y_key > 4){$this->y_key -= 5;};

            $this->x_key -= 1;
            if($this->x_key < 0){$this->x_key += 5;};

            return $this->letters_table[$this->y_key][$this->x_key];
        }

        function encrypt($message, $key) {
            $this->setValues($message, $key);
            $this->setTable();
            $this->handleMessage();

            $cipherText = '';

            foreach($this->message as $letter){
                $this->get_Y_and_X($letter);
                $newLetter = $this->encryptOneLetter($letter);
                $cipherText = $cipherText . $newLetter;
            };

            return $cipherText;
        }

        function decrypt($message, $key) {
            $this->setValues($message, $key);
            $this->setTable();
            $this->handleMessage();

            $decrypted_message = '';

            foreach($this->message as $letter){
                $this->get_Y_and_X($letter);
                $newLetter = $this->decryptOneLetter($letter);
                $decrypted_message = $decrypted_message . $newLetter;
            };

            return $decrypted_message;
        }
    }

    /* $abdul = new Abdul;
    $abdul->encrypt('ALI', 'FOOD');
    $abdul->decrypt('UDV', 'FOOD'); */
?>