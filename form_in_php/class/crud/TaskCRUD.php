<?php

namespace crud;

use models\Task;

class TaskCRUD {

    public function createTask(Task $task) {
        $query = "INSERT INTO Task (id_user, name, due_date, done)
                    VALUES (:id_user, :name, :due_date, :done);";
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        $stm->bindValue(':id_user', $task->id_user, \PDO::PARAM_INT);
        $stm->bindValue(':name', $task->name, \PDO::PARAM_STR);
        $stm->bindValue(':due_date', $task->due_date, \PDO::PARAM_STR);
        $stm->bindValue(':done', $task->done, \PDO::PARAM_INT);
        $stm->execute();
        return $conn->lastInsertId();
    }

    public function readTask(int $id_user=null, int $id_task=null) {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        if(!is_null($id_user)) {
            $query = "SELECT * FROM Task WHERE id_user = :id_user;";
            $stm = $conn->prepare($query);
            $stm->bindValue(':id_user', $id_user, \PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_CLASS, Task::class);
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
            $query = "SELECT * FROM Task;";
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_CLASS, Task::class);
            if(count($result) === 0) {
                return false;
            }
            return $result;
        }
    }

    public function readTaskId(int $id_task) {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        if(!is_null($id_task)) {
            $query = "SELECT * FROM Task WHERE id_task = :id_task;";
            $stm = $conn->prepare($query);
            $stm->bindValue(':id_task', $id_task, \PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_CLASS, Task::class);
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
            $query = "SELECT * FROM Task;";
            $stm = $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_CLASS, Task::class);
            if(count($result) === 0) {
                return false;
            }
            return $result;
        }


    }

    public function updateTask(Task $task) {
        if(!$this->readTask($task->id_task)){
            throw new \Exception("utente inesistente", 404);
        }
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "UPDATE Task SET id_user=:id_user, name=:name, due_date=:due_date, done=:done WHERE id_task = :id_task;";
        $stm = $conn->prepare($query);
        $stm->bindValue(':id_user', $task->id_user, \PDO::PARAM_INT);
        $stm->bindValue(':name', $task->name, \PDO::PARAM_STR);
        $stm->bindValue(':due_date', $task->due_date, \PDO::PARAM_STR);
        $stm->bindValue(':done', $task->done, \PDO::PARAM_INT);
        $stm->bindValue(':id_task', $task->id_task, \PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();
    }

    public function deleteTask(int $id_task=null) {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM Task WHERE id_task = :id_task;";
        $stm = $conn->prepare($query);
        $stm->bindValue(':id_task', $id_task, \PDO::PARAM_INT);
        $stm->execute();
        return $stm->rowCount();
    }

}

?>