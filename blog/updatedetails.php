<?php
session_start();
require "db/connect.php";

if(isset($_POST["submit"]))
{
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$out=$conn->prepare("update member set fname=?,lname=?,email=? where id=?");
	$out->bind_param("sssi",$fname,$lname,$email,$_SESSION["user"]);
	$out->execute();
	header("Location:updatedsuccess.html");
	die();
}	
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="back.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Update Account Details</title>
  </head>
  <style media="screen">

  .pos{
    width:40%;
    background-color: rgba(56, 40, 40,0.7);
    color:white;
    margin-left:450px;
    border-radius: 6%;
    margin-top:100px;
  }
  form{
    padding-left:30px;
    padding-right:30px;
    padding-bottom:30px;
  }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="userhome.html">Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="userposts.php">View your posts</a></li>
          <li class="nav-item"><a class="nav-link" href="usercreate.php">Create a post</a></li>
          <li class="nav-item"><a class="nav-link" href="updatedetails.php">Update Details</a></li>
          <li class="nav-item"><a class="nav-link" href="userpassword.php">Change Password</a></li>
          <li class="nav-item"><a class="nav-link" href="Logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="pos text-center">
      <h4 style="padding-top:10px;">Update Details</h4>
    <form method="post">
	<?php
	$result=$conn->prepare("select fname,lname,email from member where id=?");
	$result->bind_param("i",$_SESSION["user"]);
	$result->execute();
	$result->bind_result($fname,$lname,$email);
	$result->fetch();
	?>
        <label style="margin-top:20px;">First Name</label>
        <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>">
        <label style="margin-top:20px;">Last Name</label>
        <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>">
        <label style="margin-top:20px;">E-mail</label>
        <input type="email" class="form-control" name="email" value="<?php echo $email;
		$result->close();?>">
        <input type="submit" class="btn btn-primary" style="margin-top:20px;" name="submit" value="Update">
      </div>
    </form>

  </body>
</html>
