<?php
session_start();
require "db/connect.php";
$counter=0;
if(isset($_POST["submit"]))
{
	$email=$_POST["email"];
	$password=$_POST["password"];
	$result=$conn->prepare("select id,email,password from member where email=? and password=?");
	$result->bind_param("ss",$email,$password);
	$result->execute();
	$result->bind_result($id,$emailf,$passwordf);
	$result->fetch();
	if($email===$emailf and $password===$passwordf)
	{
		$_SESSION["user"]=$id;
		header("Location:userhome.html");
		die();
	}	
	else
		$counter=1;
		
}	

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" href="back.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User Login</title>
  </head>
<style media="screen">

.pos{
  width:30%;
  background-color: rgba(56, 40, 40,0.7);
  color:white;
  margin-left:520px;
  border-radius: 6%;
  margin-top:150px;
}
form{
  padding-left:30px;
  padding-right:30px;
  padding-bottom:30px;
}
</style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <div class="pos text-center">
	<?php if($counter){
			echo "Wrong email or password";
	}?>
      <h4 style="padding-top:10px;">Login</h4>
    <form method="post">
        <label for="1" style="margin-top:20px;">E-mail</label>
        <input id="1" type="email" class="form-control"  name="email" placeholder="Email">
        <label for="2" style="margin-top:20px;">Password</label>
        <input id="3" type="password" class="form-control"  name="password" placeholder="Password">
        <input type="submit" class="btn btn-primary" style="margin-top:20px;" name="submit" value="Submit">
      </div>
    </form>
  </body>
</html>
