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
    
    /**
     * 
     */
    public static function arrayToUser(array $class_array) {
        $user = new User();
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            if($class_attribute=="id_user") {
                continue;
            }
            $user->$class_attribute = $value_of_class_attribute;
        }
        
       
        return $user;
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