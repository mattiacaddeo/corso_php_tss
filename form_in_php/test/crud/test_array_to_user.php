<?php
# clear && php form_in_php/test/crud/test_array_to_user.php
use models\User;
require "./form_in_php/test/test_autoload.php";



$class_array = [
    "first_name"=>"Paolo", 
    "last_name"=>"Rossi", 
    "birthday"=>"2020-12-20", 
    "birth_city"=>"Givoletto", 
    "id_regione"=>10, 
    "id_provincia"=>3, 
    "gender"=>"M", 
    "username"=>"a@b.it", 
    "password"=>"ciccio"
];
// $class_name = \User::class;
// $user = new $class_name;
// $user = new User();
// foreach ($class_array as $class_attribute => $value_of_class_attribute) {
//     $user->$class_attribute = $value_of_class_attribute;
// }

$user = User::arrayToUser($class_array);
if(get_class($user) == User::class) {
    echo "test passato, è un oggetto di tipo User::class \n";
}
print_r($user);





echo "\n";

?>