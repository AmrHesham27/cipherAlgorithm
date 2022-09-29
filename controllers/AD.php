<?php

class AD {
    public $Hex = array(
        'A' => '00',
        'B' => '01',
        'C' => '02',
        'D' => '03',
        'E' => '04',
        'F' => '05',
        'G' => '06',
        'H' => '07',
        'I' => '08',
        'J' => '09',
        'K' => '0A',
        'L' => '0B',
        'M' => '0C',
        'N' => '0D',
        'O' => '0E',
        'P' => '0F',
        'Q' => '10',
        'R' => '11',
        'S' => '12',
        'T' => '13',
        'U' => '14',
        'V' => '15',
        'W' => '16',
        'X' => '17',
        'Y' => '18',
        'Z' => '19'
    );

    public $Hex_index = 
        array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');

    public function handleText_encrypt($plainText) {
        $letters_array = str_split(strtoupper(trim($plainText)));
        
        // no pairs with the same letter => ( CC => CXC )
        for ($i=1; $i < count($letters_array); $i++) {
            if($letters_array[$i] == $letters_array[$i-1] ) {
                array_splice( $letters_array, $i, 0, 'X' );
            }
        };
        // if last letter not in pair => add Z
        if(count($letters_array) % 2){
            array_push($letters_array, 'Z');
        }
        
        // turn letters to pairs of hex => ['N', 'E', 'T', 'W'] => [ '0E05', '1417' ]
        $pairs_array = array();
        for ($i=0; $i < count($letters_array); $i++) {
            if( ($i%2) == 0 ){
                $newString = $this->Hex[ $letters_array[$i] ] . $this->Hex[ $letters_array[$i+1] ];
                array_push( $pairs_array, $newString );
            };
        };

        return $pairs_array;
    }

    public function encrypt_one_pair ($array) {
        // check if same row
        if($array[0] == $array[2]){
            foreach([1 => $array[1], 3 => $array[3]] as $key => $letter_array) {
                if($letter_array != 'F') {
                    $old_index = array_search($letter_array, $this->Hex_index);
                    $new_index = $old_index + 1;
                    $array[$key] = $this->Hex_index[$new_index];
                };
            }
            return $array[0] . $array[1] . $array[2] . $array[3];
        }
        // check if same column
        elseif($array[1] == $array[3]){
            foreach([0 => $array[0], 2 => $array[2]] as $key => $letter_array) {
                if($letter_array != 'F') {
                    $old_index = array_search($letter_array, $this->Hex_index);
                    $new_index = $old_index + 1;
                    $array[$key] = $this->Hex_index[$new_index];
                }
            }
            return $array[0] . $array[1] . $array[2] . $array[3];
        }
        // if different row and column => chnage corner in the same row in the square
        else {
            $new_array = array();
            $new_array[0] = $array[0]; // no change
            $new_array[1] = $array[3];
            $new_array[2] = $array[2]; // no change
            $new_array[3] = $array[1];
            return $new_array[0] . $new_array[1] . $new_array[2] . $new_array[3];
        };
    }

    public function handleText_decrypt ($cipher) {
        $cipher = str_split(strtoupper(trim($cipher)));
        $letters_array = array();
        for ($i=0; $i < count($cipher); $i++) {
            if( ($i%4) == 0 ){
                array_push($letters_array, 
                    [ $cipher[$i], $cipher[$i+1], $cipher[$i+2], $cipher[$i+3] ]
                );
            }
        };
        return $letters_array;
    }

    public function decrypt_one_pair ($array) {
        // check if same row
        if($array[0] == $array[2]){
            foreach([1 => $array[1], 3 => $array[3]] as $key => $letter_array) {
                if($letter_array != '0') {
                    $old_index = array_search($letter_array, $this->Hex_index);
                    $new_index = $old_index - 1;
                    $array[$key] = $this->Hex_index[$new_index];
                };
            }
            return $array[0] . $array[1] . $array[2] . $array[3];
        }
        // check if same column
        elseif($array[1] == $array[3]){
            foreach([0 => $array[0], 2 => $array[2]] as $key => $letter_array) {
                if($letter_array != '0') {
                    $old_index = array_search($letter_array, $this->Hex_index);
                    $new_index = $old_index - 1;
                    $array[$key] = $this->Hex_index[$new_index];
                }
            }
            return $array[0] . $array[1] . $array[2] . $array[3];
        }
        // if different row and column => chnage corner in the same row in the square
        else {
            $new_array = array();
            $new_array[0] = $array[0]; // no change
            $new_array[1] = $array[3];
            $new_array[2] = $array[2]; // no change
            $new_array[3] = $array[1];
            return $new_array[0] . $new_array[1] . $new_array[2] . $new_array[3];
        };
    }

    public function encrypt($plainText){
        $pairs_array = $this->handleText_encrypt($plainText);

        $cipher = '';
        foreach($pairs_array as $pair) {
            $new_cipher = $this->encrypt_one_pair($pair);
            $cipher = $cipher . $new_cipher;
        };
        return $cipher;
    }

    public function decrypt($cipher) {
        $letters_array = $this->handleText_decrypt($cipher);

        $new_cipher = '';
        foreach($letters_array as $array){
            $new_decrypt = $this->decrypt_one_pair($array);
            $new_cipher = $new_cipher . $new_decrypt;
        };

        $text = '';
        for($i=0; $i<strlen($new_cipher); $i++){
            if($i%2 == 0){
                $letter = $new_cipher[$i] . $new_cipher[$i+1];
                $hex_index = array_search($letter, $this->Hex);
                $text = $text . $hex_index;
            }
        };
        return $text;
    }
}

/* $new_AD = new AD();
//print_r($new_AD->encrypt('UAG'));
print_r($new_AD->decrypt('10040916'));  */


?>