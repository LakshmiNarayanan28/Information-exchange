<?php
session_start();
include "database.php";

if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
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
<h3 id="heading">CHANGE PASSWORD</h3>  

   <div id="center">
      <?php
	   if(isset($_POST["submit"]))
	   {
		   $sql="SELECT * from admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
		      $res=$db->query($sql);
			  if($res->num_rows>0)
			  {
				    $s="update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
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
      <b>    <label>OLD PASSWORD</label></b>
		      <input type="password" name="opass" required>
			  
		  
		 <b> <label>NEW PASSWORD</label></b>
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
  include "adminSidebar.php";
  ?>

</div>
<div id="footer">
<center>
<p>Copyright &copy;BY LakshmiNarayanan</p>
</center>
</div>
</div>
</body>
</html>