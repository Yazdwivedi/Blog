<?php
session_start();

require "db/connect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="back.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User Posts</title>
  </head>
<style media="screen">

table{
  margin-left:50px;
  margin-top:20px;
  font-size:30px;
 
}
td{

  width:450%;

}
thead{
	text-decoration:underline;
}
.pos{
  padding-top:0px;
  padding-right:10px;
  color:white;
  width:75%;
  margin-left:auto;
  margin-right:auto;
  background-color: rgba(56, 40, 40,0.7);
}
</style>
  <body >
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
    <table>
      <tr>
        <td>Title</td>
        <td>Update</td>
        <td>Delete</td>
      </tr>
	  <?php $result=$conn->prepare("select id,title from blogs where m_id=?");
	  $result->bind_param("i",$_SESSION["user"]);
	  $result->execute();
	  $result->store_result();
	  $result->bind_result($id,$title);
	  while($result->fetch())
	  {
	  ?>
      <tr>
        <td><?php echo $title;?></td>
        <td>
		<form method="post">
		<button type="submit" class="btn btn-primary" name="update">Update</button>
		<input type="hidden" name="upid" value="<?php echo $id ?>"> 
		
		</td>
		<?php
		if(isset($_POST["update"]))
		{
			$_SESSION["id"]=$_POST["upid"];
			header("Location:userupdate.php");
			die();
		}	
		?>

		<input type="hidden" name="delid" value="<?php echo $id ?>"> 
		<td><button type="submit" class="btn btn-danger" name="delete">Delete</button>
		</form>
		<?php
		if(isset($_POST["delete"]))
		{ 

			

			if($out=$conn->prepare("delete from blogs where id=?"))
				{
					$out->bind_param("i",$_POST["delid"]);
					$out->execute();
					$out->close();
					$_POST[]=array();
					header("Location:deletesuccess.html");
					die();
					
				}
				
				
		

			//unset($_POST["delete"]);
		}	
		?>	
		</td>	
	
      </tr>
	  <?php 
	  }
	  ?>
    </table>
  </div>

  </body>
</html>
