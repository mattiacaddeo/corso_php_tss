<?php

class ValidateName {

    public function isValid($name):bool {
        if((!preg_match("/^[a-zA-z]*$/", $name)) || $name == null) {
            return false;
        } else {
            return true;
        }
    }
}

?>