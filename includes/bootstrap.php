<?php
/*
require_once ('Database.php');
require_once ('Session.php');
require_once ('Category.php');
require_once ('Entry.php');
require_once ('Comment.php');*/
//require_once ('User.php');
require_once ('config.php');


spl_autoload_register(function ($class){
    $class=ucfirst($class);
    $ext ='.php';
    $file = __DIR__ ."/". $class. $ext;
    if (is_readable($file)){
        require_once ($file);
    }


});

$dbc = new Database();
$session = new Session();




?>