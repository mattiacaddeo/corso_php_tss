<?php

class ValidateMail implements Validable {

    private $email;
    private $message;
    private $hasMessage;
    private $valid;
    
    public function __construct($default_value = '', $message='è obbligatorio') {
        $this->email = $default_value;
        $this->message = $message;
        $this->valid = true;
    }

    public function isValid(mixed $email):bool {
        $strip_tag = strip_tags($email);
        $valueWithoutSpace = trim($strip_tag);
        if($valueWithoutSpace == '') {
            $this->valid = false;
            return false;
        }
        $this->email = filter_var($valueWithoutSpace, FILTER_VALIDATE_EMAIL);
        return filter_var($valueWithoutSpace, FILTER_VALIDATE_EMAIL);
    }

    public function getMessage() {
        return $this->message;
    }
    public function getValid() {
        return $this->valid;
    }
    public function getValue() {
        return $this->email;
    }

}

?>