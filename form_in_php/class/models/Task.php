<?php

namespace models;

class Task {

    public $id_task;
    public $id_user;
	public $name;
	public $due_date;
	public $done;

    public static function arrayToTask(array $class_array) {
        $task = new Task();
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            $task->$class_attribute = $value_of_class_attribute;
        }
        return $task;
    }

    
}

?>