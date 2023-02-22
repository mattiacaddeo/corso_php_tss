<?php

class ValidateRequired implements Validable{
    public function isValid($value) {

        //$valueWithoutSpace = trim(strip_tags($value));
        $strip_tag = strip_tags($value);
        $valueWithoutSpace = trim($strip_tag);
        if($valueWithoutSpace == '') {
            return false;
        }
        return $valueWithoutSpace;
    }
}

?>