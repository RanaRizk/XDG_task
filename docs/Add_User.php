
<html>
<head>
	<title> Add User </title>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	 	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
<?php
	$flag = false;
	$error = false;
	function __autoload($classname) {
    $filename =  $classname .".php";
    include_once($filename);
    }
 
	$dataValidation = $_POST;

	$rules = array(
		'username' => 'required',
		'Email' => 'required%email',
		'password' => 'required',
		'confpassword' => 'required',
		'userfile' => 'exists',
		'answer'=>'required',
		'gender'=>'required'
		
		);

$obj = ORM::getInstance();
$obj->setTable('users');

if (isset($_POST['submit'])) {
	
    $valid = new validation();
    $result = $valid->validate($dataValidation,$rules);
    if ($result == TRUE) {
    	//check password validation 
    	if ($_POST['password'] == $_POST['confpassword']) {
    		
		
		$data = array(
			'email'=>$_POST['Email'] ,
			'password'=>($_POST['password']),
			'username'=>$_POST['username'] ,
			'profileImg'=>$_FILES['userfile']['name'],
			'gender'=>$_POST['gender'],
			'answer'=>$_POST['answer']
			);
			

		if (!isset($_GET['id'])) {
			//insert new record/user
			$user = $obj->insert($data);  
			if ($user > 0) {
				header("Location: http://localhost/XDG_task/docs/Login_User.php");
			
			}else{
				$str = "This Email Already Exists .. ";
				$error = true;
			}
	
		}else{
			//update existing user
			$result = $obj->update($data,$_GET['id']);
			if ($result) {
				header("Location: http://localhost/XDG_task/docs/Login_User.php");
			}else{
				$error = "Cannot updated ... ";
			}
		}

		
    		
    }else{
    		$str =  "incorrect password";
    		$error = true;
    	}

    }else{


    	if (isset($_GET['id'])){

    		foreach($valid->errors as $error)
            {
			  if ($error == "the password required" || $error=="the confpassword required" 
			  	|| $error == "No file uploaded") {
    			 	$userInfo = $obj->selectwhere("id",$_GET['id']);
    			 	$userImg = $userInfo[0]['profileImg'];
    			 	$userpass = $userInfo[0]['password'];

    		  }
    		  if (isset($_FILES['userfile']['name'])) {
    		  	$userInfo = $obj->selectwhere("id",$_GET['id']);
    			$userImg = $userInfo[0]['profileImg'];
    			unlink("../uploades/".$userImg);
    		  	 $userImg = $_FILES['userfile']['name'];
    		  }

		    }

		    $data = array(
			'email'=>$_POST['Email'] ,
			'password'=>$userpass,
			'username'=>$_POST['username'] ,
			'profileImg'=>$userImg,
			'gender'=>$_POST['gender'],
			'answer'=>$_POST['answer']
			);

		    $result = $obj->update($data,$_GET['id']);
			if ($result) {
				header("Location: http://localhost/XDG/docs/Login_User.php");
			}else{
				$error = "Cannot updated ... ";
			}
    	}else{

  		  	$flag = true;
    	}



    }

   }
		


   if (isset($_GET['id'])) {
 		$userData = $obj->selectwhere("id",$_GET['id']);


   }


?>

<div class="container">
 <div class="row">
    <div class="col-md-8" >
<h1 class="page-header"> Registration Form </h1>
<form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data" />
 
<div class="alert alert-danger" role="alert">
 
		<?php 
		if($flag == true){
			foreach($valid->errors as $error)
            {
			  echo $error."<br/>";

		    }

		}elseif($error == true){
			echo $str."<br/>" ;
		}
		else{
			echo " No Error ";
		}

		?>
</div>

	
   <h5> <strong> Name : </strong></h5>
	<input type="text" class="form-control  has-error" id="inputError1" placeholder="Text input" name="username" value=<?php 
			 if (!empty($_POST["username"]))
	   		{
	   					echo $_POST['username'];
	   		}elseif (isset($_GET['id'])) {
	   			foreach ($userData as $key => $value) {
	   				echo $value['username'];
	   			}
	   		}

?>>

    <h5> <strong>Email : </strong></h5>
   <input type="text" class="form-control" placeholder="example@gmail.com" name="Email" value=<?php 
 			  if (!empty($_POST["Email"]))
   				{
   					echo $_POST['Email'];
   				}elseif (isset($_GET['id'])) {
	   			foreach ($userData as $key => $value) {
	   				echo $value['email'];
	   			}
	   		}?>>


   <h5> <strong>password : </strong></h5>
   <input type="password" class="form-control" placeholder="Text input" name="password" value=<?php 
   		 if (!empty($_POST["password"]))
   				{
   					echo $_POST['password'];
   				}
   ?>>

   <h5> <strong>Confirm Password : </strong></h5>
   <input type="password" class="form-control" placeholder="Text input" name="confpassword" value=<?php 
   		 if (!empty($_POST["password"]))
   				{
   					echo $_POST['password'];
   				}
   ?>>
   <h5> <strong>what is your grand Father work? </strong></h5>


   <h5> <strong>Answer : </strong></h5>
   <input type="text" class="form-control" placeholder="answer" name="answer" value=<?php 
 			  if (!empty($_POST["answer"]))
   			  {
   					echo $_POST['answer'];
   			  }elseif (isset($_GET['id'])) {
	   			foreach ($userData as $key => $value) {
	   				echo $value['answer'];
	   			}
	   		}?>>



<h5> <strong>Gender : </strong></h5>
<input type="radio" name="gender" value="male" 

<?php 
if (!empty($_POST["gender"])) {
	if ($_POST['gender'] == "Male") {
		echo 'checked';
	}elseif (isset($_GET['id'])) {
	   			foreach ($userData as $key => $value) {
	   				if($value['gender']=="Male"){
	   					echo "checked";
	   				}
	   			}
	 }
	   
}
?> >Male<br>
<input type="radio" name="gender" value="female" 

<?php 
if (!empty($_POST["gender"])) {
	if ($_POST['gender'] == "Female") {
		echo 'checked';
	}
}elseif (isset($_GET['id'])) {
	   			foreach ($userData as $key => $value) {
	   				if($value['gender']=="Female"){
	   					echo "checked";
	   				}
	   			}
	 }
?>>Female


   <h5> <strong>Profile Pic : </strong></h5>
    <input type="file"  name="userfile" id="userfile" />
<br/>

<div class="form-group">
	<input type="reset" value="Reset"  class="btn btn-warning" value="Reset" /> 
    <input type="submit" name="submit" class="btn btn-primary" value="submit"> 
</div>
   	
</form>
</div>
</div>
</div>
<?php 


?>
</body>
</html>