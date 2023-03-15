<?php
// print_r(__DIR__);
// echo "<br>";
// print_r(__FILE__);
spl_autoload_register(function($className) {
    // /Applications/XAMPP/xamppfiles/htdocs/corso_php_tss/form_in_php
    
    $classPath =  str_replace("\\", "/", __DIR__."/class//".$className);
    require $classPath.".php";
});


?>