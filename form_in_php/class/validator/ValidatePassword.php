<?php

namespace validator;
class ValidatePassword implements Validable {

    private $password;
    private $message;
    private $hasMessage;
    private $valid;
    
    public function __construct($default_value = '', $message='è obbligatorio') {
        $this->password = $default_value;
        $this->message = $message;
        $this->valid = true;
    }

    public function isValid($password) {
        $strip_tag = strip_tags($password);
        $valueWithoutSpace = trim($strip_tag);
        if($valueWithoutSpace == '') {
            $this->valid = false;
            return false;
        }
        $this->password =  $valueWithoutSpace;
        return  $valueWithoutSpace;
    }

    public function getMessage() {
        return $this->message;
    }
    public function getValid() {
        return $this->valid;
    }
    public function getValue() {
        return $this->password;
    }

    // public function isValid($password):bool {
    //     $test1 = htmlspecialchars($password);
    //     if(((!preg_match("/^[A-Za-z0-9]*$/", $test1)) ) || $test1 == null) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }
}

?>