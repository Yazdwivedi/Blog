<?php
session_start();
require "db/connect.php";

if(isset($_POST["submit"]))
{
	$title=$_POST["title"];
	$content=$_POST["content"];
	$result=$conn->prepare("update blogs set title=?,content=? where id=?");
	$result->bind_param("ssi",$title,$content,$_SESSION["id"]);
	$result->execute();
	unset($_SESSION["id"]);
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
    <title>Post Update</title>
  </head>
  <style media="screen">

  .pos{
    width:60%;
    color:white;
    margin-left:310px;
    margin-top:150px;
    background-color: rgba(56, 40, 40,0.7);
    border-radius:6%;
  }
  .los{
    width:40%;
    margin-left:100px;
    padding-top:30px;
  }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
    <form class="los" method="post">
      <label style="margin-left:300px;">Title</label>
	  <?php 
	  $result=$conn->prepare("select title,content from blogs where id=?");
	  $result->bind_param("i",$_SESSION["id"]);
	  $result->execute();
	  $result->bind_result($title,$content);
	  $result->fetch();
	  ?>
      <input style="margin-left:150px;" type="text" class="form-control" name="title" value="<?php echo $title; ?>">
      <label style="margin-left:290px;">Content</label><br>
      <textarea style="margin-left:30px;"name=" content" rows="8" cols="80"><? echo $content ;?></textarea>
	  <?php $result->close(); ?>
      <button style="margin-left:290px;margin-bottom:30px;" type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
  </body>
</html>
