<?php
require "db/connect.php";
session_start();	

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Posts</title>
  </head>
<style media="screen">
body{
  background-image: url("http://www.bestlookspa.com/wp-content/uploads/2014/09/background-old-paper.jpg");
  background-repeat:no-repeat;
  background-attachment:fixed;
  background-size:cover;
}
.pos{
	margin-top:50px;
	width:60%;
	height:100vh;
	background-color:rgba(56, 40, 40,0.7);
	margin-left:auto;
	margin-right:auto;
	color:white;
	
}	
</style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="home.html">Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="posts.php">View Posts</a></li>
          <li class="nav-item"><a class="nav-link" href="userlogin.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="userregister.php">Register</a></li>
        </ul>
      </div>
    </nav>
	<div class="pos container text-center">
	<?php
	$result=$conn->prepare("select title,content from blogs where id=?");
	$result->bind_param("i",$_SESSION["ids"]);
	$result->execute();
	$result->bind_result($title,$content);
	$result->fetch();
	?>
		<span style="font-size:56px;text-decoration:underline;"><?php echo $title;?></span>
		<p style="margin-top:5vh;letter-spacing:0.1em;line-height:1.5em;word-spacing:7px;"><?php echo $content;
																								//unset($_SESSION["ids"]);session_destroy();?></p>
	</div>	


  </body>
</html>
