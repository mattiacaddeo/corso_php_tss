<?php
namespace validator;
class ValidateDate implements Validable {

    private $date;
    private $message;
    private $hasMessage;
    private $valid;
    
    public function __construct($default_value = '', $message='è obbligatorio') {
        $this->date = $default_value;
        $this->message = $message;
        $this->valid = true;
    }

    public function isValid($date)
    {/*
        $strip_tag = strip_tags($date);
        $valueWithoutSpace = trim($strip_tag);
        
        $d = \DateTime::createFromFormat('d-m-Y', $valueWithoutSpace);
        $date2 = $d->format('Y-m-d');
        if($date2 === $valueWithoutSpace) {
            //echo "$date date is valid.";
            return $valueWithoutSpace;
            
        } else {
            $this->valid = false;
            return false;
            //return $valueWithoutSpace;
        }*/
        
        $strip_tag = strip_tags($date);
        $valueWithoutSpace = trim($strip_tag);
        if($valueWithoutSpace == '') {
            $this->valid = false;
            return false;
        }
        $this->date = $valueWithoutSpace;
        return $valueWithoutSpace;
        
    }

    public function getMessage() {
        return $this->message;
    }
    public function getValid() {
        return $this->valid;
    }
    public function getValue() {
        return $this->date;
    }
}
?>