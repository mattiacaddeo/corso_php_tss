<?php
use PHPUnit\Framework\TestCase;
require_once "./config.php";
require_once "./tests/HTTPClient.php";

class UserApiCreateTest extends TestCase {

    public function test_create_user_api()
    {
        (new \PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("SET FOREIGN_KEY_CHECKS=0; TRUNCATE TABLE user; SET FOREIGN_KEY_CHECKS=1;"); 
        $payload  = [
            "first_name" => "Mirio",
            "last_name" => "DaRoit",
            "birthday" => "2017-03-17",
            "birth_city" => "Fermo",
            "id_regione" => 16,
            "id_provincia" => 15,
            "gender" => "M",
            "username" => "d@email.com",
            "password" => "ciccio"
        ];

        $response = post("http://localhost/corso_php_tss/form_in_php/rest_api/users.php", $payload);
        fwrite(STDERR, print_r($response, TRUE));

        $this->assertJson($response);
    }

}

?>