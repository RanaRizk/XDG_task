<?php 
session_start();
function __autoload($classname) {
    $filename =  $classname .".php";
    include_once($filename);
    }
session_destroy();
				header("Location: http://localhost/XDG_task/docs/start.php");

?>