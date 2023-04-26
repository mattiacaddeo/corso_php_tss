<?php
use PHPUnit\Framework\TestCase;
require_once "./form_in_php/config.php";
require_once "./tests/HTTPClient.php";

class TaskApiCreateTest extends TestCase {
    
    public function test_create_task_api() {
        //(new \PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE Task;");

        $payload = [
            "id_user" => 3,
            "name" => "Comprare latte",
            "due_date" => "2023-04-24",
            "done" => false
        ];

        $response = post("http://localhost/corso_php_tss/form_in_php/rest_api/tasks.php", $payload);
        fwrite(STDERR, print_r($response, TRUE));

        $this->assertJson($response);
    }


}

?>