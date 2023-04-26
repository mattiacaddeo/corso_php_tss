<?php
use PHPUnit\Framework\TestCase;
require_once "./form_in_php/config.php";
require_once "./tests/HTTPClient.php";

class UserApiReadTest extends TestCase {

    public function test_get_user_api()
    {
        //(new \PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("SET FOREIGN_KEY_CHECKS=0; TRUNCATE TABLE user; SET FOREIGN_KEY_CHECKS=1;"); 
        $payload  = [];

        $response = get("http://localhost/corso_php_tss/form_in_php/rest_api/users.php");
        fwrite(STDERR, print_r($response, TRUE));
        //$this->assertJson($response);
    }

}

?>