
<html>
<head>
  <title>Login</title>
  
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="animatedPopup.js"></script>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">XDG</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://localhost/XDG_task/docs/start.php">Home</a></li>
        <li><a href="http://localhost/XDG_task/docs/Login_User.php">login</a></li>
        <li><a href="http://localhost/XDG_task/docs/Add_User.php">sign up</a></li>
        <li><a href="http://localhost/XDG_task/docs/List_User.php">Protected Page</a></li>
      
      </ul>
    </div>
  </div>
</nav>


</head>

<body>

<div class="container-fliud">


<?php
function __autoload($classname) {
    $filename =  $classname .".php";
    include_once($filename);
    }
$error = false;
$dataValidation = $_POST;

  $rules = array(
    'email' => 'required%email',
    'password' => 'required'
    );


if (isset($_POST['submit'])) {

  $valid = new validation();
    $val = $valid->validate($dataValidation,$rules);
    if ($val == TRUE) {

  $obj = ORM::getInstance();
  $obj->setTable('users');

  $result = $obj->selectAll();
  foreach ($result as $key => $value) {
    if ($value['email'] == $_POST['email']) {
      if ($value['password'] === $_POST['password']) {
        
        session_start();
        $_SESSION['username'] = $value["username"];
        $_SESSION['password'] = $value["password"];
         $_SESSION['email'] = $value["email"];
        $_SESSION['id'] = $value["id"];
            header("Location: http://localhost/XDG_task/docs/List_User.php");
      }else {

        // password is incorrect
        $flag = true;
        
      }
    }
  }

}else{
  //if validation have an error
  $error = true;
}
}
?>

 <div class="row">


    <div class="col-md-8" style="width:1000px">
    <h1 class="page-headergin">Login </h1>
    <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data" />
      <h5> <strong> Email : </strong></h5>
        <input type="text" class="form-control  has-error" placeholder="example@gmail.com" name="email" value=<?php 
             if (!empty($_POST["email"]))
              {
                  echo $_POST['email'];
              }
?>>

    <h5> <strong>password : </strong></h5>
   <input type="password" class="form-control" placeholder="password" name="password">
   <br/>

<div class="form-group">
<a href="http://localhost/XDG_task/docs/Forget_Password.html" style="margin-left:20px; margin-top:20px;"><font size="0.5">Forget password?</font></a>
<a href="http://localhost/XDG_task/docs/New_Password.html" style="margin-left:20px; margin-top:20px;"><font size="0.5">New password?</font></a>
      
 <input type="submit" name="submit" class="btn btn-primary" style="float:right" value="submit"> 
</div>
<?php 
if (isset($flag) && $flag==true) {
?>
<div class="alert alert-danger" role="alert" > Your password isnot valid </div>

<?php  } ?>

<?php 
if (isset($error) && $error==true) {
?>
<div class="alert alert-danger" role="alert" > 
<?php 
foreach($valid->errors as $error)
 {
        echo $error."<br/>";
 }
?>

 </div>

<?php  } ?>




</form>
    </div>
 </div>




 </div>




</body>
</html>