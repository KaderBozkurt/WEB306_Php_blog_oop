<?php
/*
require_once ('Database.php');
require_once ('Session.php');
require_once ('Category.php');
require_once ('Entry.php');
require_once ('Comment.php');*/
require_once ('User.php');


spl_autoload_register(function ($class){
    $class=ucfirst($class);
    $ext ='.php';
    $file = 'classes/' . $class. $ext;
    if (is_readable(__DIR__ . $file . $class . $ext)){
        require_once (__DIR__ . $file .$class . $ext);
    }



//$obj = new Database();
//$obj1 = new Session();
$dbc = new Database();
$session = new Session();

});






?>