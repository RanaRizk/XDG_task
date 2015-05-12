<?php

        $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
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
        <li class="active"><a href="http://localhost/XDG_task/docs/start.php">Home</a></li>
        <li><a href="http://localhost/XDG_task/docs/Login_User.php">login</a></li>
        <li><a href="http://localhost/XDG_task/docs/Add_User.php">sign up</a></li>
        <li><a href="http://localhost/XDG_task/docs/List_User.php">Protected Page</a></li>
      
      </ul>
    </div>
  </div>
</nav>


<style type="text/css">
h2{
    margin: 0;     
    color: #666;
    padding-top: 90px;
    font-size: 52px;
    font-family: "trebuchet ms", sans-serif;    
}
.item{
    background: #333;    
    text-align: center;
    height: 300px !important;
}
.carousel{
    margin-top: 20px;
}
.bs-example{
  margin: 20px;
}
</style>
</head>
<body>
<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
      <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
       <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item">
                <h2>Slide 1</h2>
                <div class="carousel-caption">
                          <img src="../uploads/1.jpg" width="500" height="200">

                </div>
            </div>
            <div class="item">
                <h2>Slide 2</h2>
                <div class="carousel-caption">
                          <img src="../uploads/2.jpg" width="500" height="200">

                </div>
            </div>
            <div class="item">
                <h2>Slide 3</h2>
                <div class="carousel-caption">
                          <img src="../uploads/3.jpg" width="500" height="200">

                </div>
            </div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
</body>

</body>
</html>
