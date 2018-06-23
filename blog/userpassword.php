<?php
$counter=0;
session_start();
require "db/connect.php";
if(isset($_POST["submit"]))
{
	$opass=$_POST["opass"];
	$npass=$_POST["npass"];
	$result=$conn->prepare("select password from member where id=?");
	$result->bind_param("i",$_SESSION["user"]);
	$result->execute();
	$result->bind_result($password);
	$result->fetch();
	if($password===$opass)
	{
		$result->close();
		$out=$conn->prepare("update member set password=? where id=?");
		$out->bind_param("si",$npass,$_SESSION["user"]);
		$out->execute();
		header("Location:passwordchange.html");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Change Password</title>
  </head>
  <style media="screen">

  form{
    padding-left:30px;
    padding-right:30px;
    padding-bottom:30px;
  }
  .pos{
    width:30%;
    background-color: rgba(56, 40, 40,0.7);
    color:white;
    margin-left:520px;
    border-radius: 6%;
    margin-top:140px;
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
		<?php
	if($counter)
	echo "The old password must match";
	?>
      <h4 style="padding-top:20px;">Change Password</h4>
    <form method="post">
        <label for="2" style="margin-top:20px;">Old Password</label>
        <input id="2" type="password" class="form-control dis"  name="opass" placeholder="Password">
        <label for="3" style="margin-top:20px;">New Password</label>
        <input id="3" type="password" class="form-control dis"  name="npass" placeholder="New Password">
        <input type="submit" class="btn btn-primary" style="margin-top:20px;" name="submit" value="Update">
      </div>
    </form>
  </div>
  </body>
</html>
