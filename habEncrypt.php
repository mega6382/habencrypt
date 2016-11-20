<?php

class habEncrypt {

    /**
     * Encrypt a string using HAB encrypting method.
     * @param string $string String to be encrypted using HAB encodding method.
     * @param string $key Key to be used for encrypting the string
     * @return string HAB Encrypted string
     */
    function enc($string, $key) {
        $enc = "";
        $count = strlen($string);
		$string = (string)$string;
        $keyCount = strlen($key);
        for ($i = 0, $j = 0; $i < $count; $i++) {
            $char = ord($string[$i]);
            $keyChar = is_numeric($key[$j]) ? $key[$j] : ord($key[$j]);
            $encChar = $char + $keyChar;
            $enc .= chr($encChar);
            $j++;
            if ($j == $keyCount) {
                $j = 0;
            }
        }
        return $enc;
    }

    /**
     * Decrypt a HAB encrypted string.
     * @param string $string HAB encrpyted String
     * @param string $key Key that was used to encrypt the string
        * @return string HAB Decrypted string
     */
    function dec($string, $key) {
        $dec = "";
        $count = strlen($string);
		$string = (string)$string;
        $keyCount = strlen($key);
        for ($i = 0, $j = 0; $i < $count; $i++) {
            $char = ord($string[$i]);
            $keyChar = is_numeric($key[$j]) ? $key[$j] : ord($key[$j]);
            $decChar = $char - $keyChar;
            $dec .= chr($decChar);
            $j++;
            if ($j == $keyCount) {
                $j = 0;
            }
        }
        return $dec;
    }

    /**
     * Encrypt the string using HAB than Base64 encode it.
     * @param string $string String to be encrypted using HAB encodding method.
     * @param string $key Key to be used for encrypting the string
     * @return string Base64 encoded (HAB encrypted) String
     */
    function b64enc($string, $key) {
        return base64_encode($this->enc($string, $key));
    }

    /**
     * HAB decrypt Base64encoded (HAB encrypted) string 
     * @param string $string Base64 encoded HAB encrypted string.
     * @param string $key Key that was used to encrypt the string
     * @return string HAB Decrypted string
     */
    function b64dec($string, $key) {
        return $this->dec(base64_decode($string), $key);
    }

    /**
     * HAB encrypt the contents of a file
     * @param string $path Path to the file to be encrypted
     * @param string $key Key to be used for encryting file
     * @param boolean $b64 Base64 encode the Return string
     * @return string Encrypted string
     */
    function fileEnc($path, $key, $b64 = false) {
        if ($b64 === true) {
            $string = file_get_contents($path);
            return base64_encode($this->enc($string, $key));
        }
        $string = file_get_contents($path);
        return $this->enc($string, $key);
    }

    /**
     * HAB decrypt the contents of a file
     * @param string $path Path to the file to be encrypted
     * @param string $key Key that was used to encrypt the file
     * @param boolean $b64 The contents of the file are base64 encoded or not
     * @return string Decrypted string
     */
    function fileDec($path, $key, $b64 = false) {
        if ($b64 === true) {
            $string = file_get_contents($path);
            return $this->dec(base64_decode($string), $key);
        }
        $string = file_get_contents($path);
        return $this->dec($string, $key);
    }

}

