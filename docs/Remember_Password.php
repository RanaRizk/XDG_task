

<?php


function __autoload($classname) {
    $filename =  $classname .".php";
    include_once($filename);
    }
    $answer = $_GET['answer'];

 

 $obj = ORM::getInstance();
$obj->setTable('users');
$users = $obj->selectwhere("answer",$answer);
  foreach ($users as $key=>$value){
$email=$value['email'];
 $password=$value['password'];
 }

echo  '<br/>'."your password is  : ".$password ;
?>
<h1><a href="http://localhost/XDG/docs/Login_User.php" style="margin-left:20px; margin-top:20px;"><font size="0.5">Login?</font></a>
</h1>


