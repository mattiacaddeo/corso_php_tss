<?php

class ValidateDate {
    public function isValid($date, $format = 'dd-mm-yyyy') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}



?>