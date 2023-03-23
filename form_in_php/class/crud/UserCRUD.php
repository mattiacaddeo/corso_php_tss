<?php

namespace crud;

use models\User;

class UserCRUD {

    public function create(User $user) {
        $query = "INSERT INTO user (first_name, last_name, birthday, birth_city, id_regione, id_provincia, gender, username, password)
                VALUES (:first_name, :last_name, :birthday, :birth_city, :id_regione, :id_provincia, :gender, :username, :password)
                ;";
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
        $stm->bindValue(':id_regione', $user->id_regione, \PDO::PARAM_INT);
        $stm->bindValue(':id_provincia', $user->id_provincia, \PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
        $stm->bindValue(':password', $user->password, \PDO::PARAM_STR);
        $stm->execute();
    }
    
    public function update(User $user) {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "UPDATE user SET first_name=:first_name, last_name=:last_name, 
                birthday=:birthday, birth_city=:birth_city, id_regione=:id_regione, id_provincia=:id_provincia, 
                gender=:gender, username=:username, password=:password WHERE id_user = :id_user;";
        $stm = $conn->prepare($query);
        $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
        $stm->bindValue(':id_regione', $user->id_regione, \PDO::PARAM_INT);
        $stm->bindValue(':id_provincia', $user->id_provincia, \PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
        $stm->bindValue(':password', $user->password, \PDO::PARAM_STR);
        $stm->bindValue(':id_user', $user->id_user, \PDO::PARAM_INT);

        $stm->execute();
    }
    
    public function readAll() {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        
            $query = "SELECT * FROM user;";
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_CLASS, User::class);
            return $result;
        
    }
    public function read(int $id_user=null) {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        // oppure if($id_user !== null)
        if(!is_null($id_user)) {
            $query = "SELECT * FROM user WHERE id_user = :id_user;";
            $stm = $conn->prepare($query);
            $stm->bindValue(':id_user', $id_user, \PDO::PARAM_INT);
            $stm->execute();
            //$result = $stm->fetchAll(\PDO::FETCH_CLASS, 'models\User');
            // oppure
            $result = $stm->fetchAll(\PDO::FETCH_CLASS, User::class);
            if(count($result)==1) {
                return $result[0];
            }
            if(count($result)>1) {
                throw new \Exception("Chiave primaria duplicata", 1);
            }
            if(count($result) === 0) {
                return false;
            }
        } else {
            $query = "SELECT * FROM user;";
            $stm = $conn->prepare($query);
            $stm->execute();
            //$result = $stm->fetchAll(\PDO::FETCH_CLASS, 'models\User');
            // oppure
            $result = $stm->fetchAll(\PDO::FETCH_CLASS, User::class);
            if(count($result) === 0) {
                return false;
            }
            return $result;
        }

        //return $result;
    }
    

    public function delete(int $id_user=null) {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM user WHERE id_user = :id_user;";
        $stm = $conn->prepare($query);
        $stm->bindValue(':id_user', $id_user, \PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();
    }

}

?>