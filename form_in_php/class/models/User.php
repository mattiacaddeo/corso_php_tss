<?php 
namespace models;
class User {
    public $id_user;
    public $first_name;
    public $last_name;
    public $birthday;
    public $birth_city;
    public $id_regione;
    public $id_provincia;
    public $gender;
    public $username;
    public $password;

    public function label() {
        return $this->first_name." ".$this->last_name."\n";
    }
    /*
    public function getIdUser() {
        return $this->id_user;
    }
    
    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }
    */
    
}


?>