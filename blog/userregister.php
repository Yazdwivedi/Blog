<?php
require "db/connect.php";
$counter=0;
if(isset($_POST["submit"]))
{
	if($_POST["password"]===$_POST["rpassword"])
	{
		$fname=trim($_POST["fname"]);
		$lname=trim($_POST["lname"]);
		$email=trim($_POST["email"]);
		$password=trim($_POST["password"]);
		if($result=$conn->prepare("insert into member(fname,lname,email,password) values(?,?,?,?)"))
		{
			$result->bind_param("ssss",$fname,$lname,$email,$password);
			$result->execute();
			header("Location:thankregister.html");
			die();
		}
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
    <title>User Register</title>
  </head>
<style media="screen">

.pos{
  width:40%;
  background-color: rgba(56, 40, 40,0.7);
  color:white;
  margin-left:450px;
  border-radius: 6%;
  margin-top:30px;
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
		 echo"Passwords not matching";
	 }?>
      <h4 style="padding-top:10px;">Register</h4>
    <form method="post">
        <label style="margin-top:20px;">First Name</label>
        <input type="text" class="form-control" name="fname" placeholder="First Name">
        <label style="margin-top:20px;">Last Name</label>
        <input type="text" class="form-control" name="lname" placeholder="Last Name">
        <label style="margin-top:20px;">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
        <label style="margin-top:20px;">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <label style="margin-top:20px;">Retype Password</label>
        <input type="password" class="form-control" name="rpassword" placeholder="Retype Password">
        <input type="submit" class="btn btn-primary" style="margin-top:20px;" name="submit" value="Register">
      </div>
    </form>
  </body>
</html>
