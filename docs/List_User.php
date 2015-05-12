<?php ob_start(); ?>
<html>
<head>
  <title>All User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">XDG</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://localhost/XDG/docs/start.php">Home</a></li>
        <li><a href="http://localhost/XDG/docs/Logout_User.php">logout</a></li>
   
      
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
<?php 


  
function __autoload($classname) {
    $filename =  $classname .".php";
    include_once($filename);
    }
 
  $obj = ORM::getInstance();
  $obj->setTable('users');
  $users = $obj->selectAll();
         session_start();
  if (isset($_SESSION['email'])) {
?>

  <div class="container">
  <h1 class="page-header"> User List </h1>


  <table class="table table-striped" >
    <thead>
      <tr>
        <th class="text-center" >Name</th>
        <th class="text-center" >Email</th>
        <th class="text-center" >Image</th> 
      </tr>
    </thead>

    <tbody>
<?php 
    foreach ($users as $key=>$value){
      
        
      
?>
      <tr>
        <td class="text-center" ><?php echo $value['username'] ?></td>
                <td class="text-center" ><?php echo $value['email'] ?></td>

        <td class="text-center" > <img src="../uploads/<?php echo $value["profileImg"]?>" height="40" width="40" > </td> 
      </tr> 

<?php 

}
?>
    </tbody>

  </table>
</div>

  </div>





</body>
</html>

<?php
}else{
        header("Location:http://localhost/XDG/docs/Login_User.php");


}
?>