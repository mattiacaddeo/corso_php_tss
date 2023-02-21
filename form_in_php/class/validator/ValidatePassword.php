<?php

class ValidatePassword {
    public function isValid($password):bool {
        $test1 = htmlspecialchars($password);
        if(((!preg_match("/^[A-Za-z0-9]*$/", $test1)) ) || $test1 == null) {
            return false;
        } else {
            return true;
        }
    }
}

?>