

<?php


function __autoload($classname) {
    $filename =  $classname .".php";
    include_once($filename);
    }
    $password=$_GET['password'];
    $answer=$_GET['answer'];
    $obj = ORM::getInstance();
$obj->setTable('users');
$users = $obj->selectwhere("answer",$answer);
  foreach ($users as $key=>$value){
$id=$value['id'];

 }



    $query=$obj->update((array('password'=>$password)),$id);


?>
<h1><a href="http://localhost/XDG_task/docs/Login_User.php" style="margin-left:20px; margin-top:20px;"><font size="0.5">Login?</font></a>
</h1>
