<?php

class ValidateDate implements Validable
{

    public function isValid($value)
    {
        $result = trim(strip_tags($value));
        
        $d = DateTime::createFromFormat('d/m/Y', $result);
      
        if($d->format('d/m/Y') === $result) {
            //echo "$value date is valid.";
            return $d->format('d/m/Y');
            
        } else {
            return $result;
        }
    }
}
