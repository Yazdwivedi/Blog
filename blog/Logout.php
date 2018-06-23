<?php
session_start();
unset($_SESSION["user"]);
session_destroy();


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" href="back.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home</title>
  </head>
<style media="screen">
.ep{
  margin-left: 500px;
  margin-top:20px;
}
.jk{
  margin-top:50px;
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
    <h3 class="text-center" style="padding-top:20px;font-size:56px;margin-top:200px;">Succesfully Logged Out</h3>
  </body>
</html>
