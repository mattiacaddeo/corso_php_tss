<?php

class ValidateMail implements Validable {

    private $value;
    private $message;
    private $hasMessage;
    private $valid;
    
    public function __construct($default_value = '', $message='è obbligatorio') {
        $this->value = $default_value;
        $this->message = $message;
        $this->valid = true;
    }

    public function isValid(mixed $email):bool {
        // $strip_tag = strip_tags($value);
        // $valueWithoutSpace = trim($strip_tag);
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    public function getMessage() {

    }
    public function getValid() {

    }
    public function getValue() {
        
    }

}

?>