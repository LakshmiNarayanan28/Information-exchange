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
<h3 id="heading">NEW BOOK REQUEST</h3>  

   <div id="center">
      <?php
	   if(isset($_POST["submit"]))
	   {
		   $sql="insert into request (ID,MES,LOGS) values ({$_SESSION["ID"]},'{$_POST["mess"]}',now())";
		      $res=$db->query($sql);
			 
					 echo "<p class='success'>YOUR REQUEST SUCCESSFULLY SEND DUDE</p>";
			  
			  
	   }
   ?>
   <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
        
			  
		  
		<b>  <label>MESSAGE</label></b>
		  <textarea required name="mess"></textarea>
		        
				 
				 <button type="submit" name="submit">Send Message..</button>
			  
   </form>

   </div>
  

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