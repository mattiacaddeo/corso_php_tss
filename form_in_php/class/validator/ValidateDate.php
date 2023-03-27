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
    {
        // $result = trim(strip_tags($date));
        
        // $d = \DateTime::createFromFormat('d/m/Y', $result);
      
        // if($d->format('d/m/Y') === $result) {
        //echo "$value date is valid.";
        //     return $d->format('d/m/Y');
            
        // } else {
        //     return $result;
        // }
        /**/
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