<?php
session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
}
	
?>



<html>
<head>
<title>IT INFORMATION EXCHANGE</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
<div id="header">
<center>
<h1>KLNCE IT DEPARTMENT-INFORMATION EXCHANGE</h1>
</center>
</div>
<div id="wrapper">
<b><h3 id="heading">CHANGE PASSWORD</h3>  </b>

   <div id="center">
      <?php
	   if(isset($_POST["submit"]))
	   {
		   $sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
		      $res=$db->query($sql);
			  if($res->num_rows>0)
			  {
				    $s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
					$db->query($s);
					 echo "<p class='success'>PASSWORD CHANGED SUCCESSFULLY DUDE</p>";
			  }
			  else
			  {
				  echo "<p class='error'>INVALID PASSWORD..TRY AGAIN DUDE</p>";
			  }
	   }
   ?>
   <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
     <b>     <label>OLD PASSWORD</label></b>
		      <input type="password" name="opass" required>
			  
		  
		<b>  <label>NEW PASSWORD</label></b>
		         <input type="password" name="npass" required>
				 
				 <button type="submit" name="submit">Update Password</button>
			  
   </form>
   </div>
   <center>
   <img src="ss.gif" alt="smiley face" width="200" height="200">
   </center>

</div>
<div id="navi">
<?php 
  include "userSidebar.php";
  ?>

</div>
<div id="footer">
<center>
<p>Copyright &copy;By LakshmiNarayanan</p>
</center>
</div>
</div>
</body>
</html>