<?php

namespace validator;

class ValidatorRunner {
    
    private $validatorList;
    public function __construct(array $validatorList) {
        $this->validatorList = $validatorList;
    }

    public function getValidatorList() {
        return $this->validatorList;
    }

    public function isValid() {
        foreach($this->validatorList as $name_attribute => $instance_validator) {
            if(!isset($_POST[$name_attribute])){
                $_POST[$name_attribute] = "";
            }
            $instance_validator->isValid($_POST[$name_attribute]);
        }
    }

    public function getValid():bool {

        $allValid = true;
        foreach($this->validatorList as $name_attribute => $instance_validator) {
            print_r($instance_validator->getValid());
            $allValid = $instance_validator->getValid() && $allValid;
            if($allValid == false) {
                //return $instance_validator;
                break;
            }
        }
        return $allValid;
    }
}




?>