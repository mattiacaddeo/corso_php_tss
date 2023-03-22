<?php
/*
    - preservare il valore iniziale valido (e ripulito) del campo di testo
    - visualizzare il messaggio di errore per il singolo campo
      - sapere se c'è un errrore isValid()
      - ripulire e controllare i valori (sicurezza)
      - ogni validazione ha il suo messaggio di errore
      - impostare la classe di bootstrap 'is-invalid'
*/
namespace validator;
class ValidateRequired implements Validable {
    /** @var string rappresenta il valore immesso nel form ripulito */
    private $value;
    private $message;
    private $hasMessage;
    /** se il valore è valido e se devo visualizzare il messaggio */
    private $valid;
    public function __construct($default_value = '', $message='è obbligatorio') {
        $this->value = $default_value;
        $this->message = $message;
        $this->valid = true;
    }

    public function isValid($value) {
        //$valueWithoutSpace = trim(strip_tags($value));
        if($value == null) {
            $value = "";
        }
        $strip_tag = strip_tags($value);
        $valueWithoutSpace = trim($strip_tag);
        if($valueWithoutSpace == '') {
            $this->valid = false;
            return false;
        }
        $this->value = $valueWithoutSpace;
        return $valueWithoutSpace;
    }

    public function getValue() {
       return $this->value;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getValid() {
        return $this->valid;
    }
}

?>