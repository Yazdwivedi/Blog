<?php
require "db/connect.php";
session_start();	

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
		<link rel="stylesheet" href="back.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Posts</title>
  </head>
<style media="screen">

table{
  margin-left:400px;
  margin-top:20px;
  font-size:30px;
}
td{
  padding-left:130px;
  padding-right:130px;
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
    <table>
      <tr>
        <td>Title</td>
        <td>View</td>
      </tr>
	<?php if($result=$conn->query("select id,title from blogs order by time desc"))
	{
	while($row=$result->fetch_object())
	{
		$title=$row->title;
	?>  
      <tr>
        <td><?php echo $title;?></td>
	    <td>
		<form method="post">
		<input type="hidden" name="id" value="<?php echo $row->id ?>">
		<button type="submit" class="btn btn-secondary" name="submit">View</a>
		</form>
		</td>
      </tr>
	<?php 
	if(isset($_POST["submit"])){

		$_SESSION["ids"]=$_POST["id"];
		header("Location:show.php");
		die();
	}
	} 
	}
	?>
    </table>


  </body>
</html>
