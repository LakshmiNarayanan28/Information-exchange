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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Hanuman Lakshmi</title>
<link rel="icon" href="headi.png" type="image/png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
<link href="css/animate.css" rel="stylesheet" type="text/css">
 <style>
.buttony
{
	background-color:red;
	
	color:white;
	padding:15px;
	text-align:center;
	text-decoration:none;
	dispaly:inline-block;
	font-size:16px;
	margin:2px 1px;
	cursor:pointer;
		border-radius: 20px;
	border-color: #006400
}
</style>

</head>
<body>

<!--Header_section-->
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="img/logo1.png" alt="logo"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
			  <li><a href="index.php"	class="scroll-link">About Us</a></li>
			  <li><a href="index.php"		class="scroll-link">Services</a></li>
			  <li><a href="index.php"		class="scroll-link">Portfolio</a></li>
			  <li><a href="index.php"		class="scroll-link">Clients</a></li>
			  <li><a href="index.php"	class="scroll-link">Team</a></li>
			  <li><a href="index.php"		class="scroll-link">Contact</a></li>
			  <li><a href="alogin.php">Admin</a></link>
			  <li><a href="new.php" class="scroll-link">New User</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<center>

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
          <label>OLD PASSWORD</label><br>
		      <input type="password" name="opass" required><br>
			  
		  
		  <label>NEW PASSWORD</label><br>
		         <input type="password" name="npass" required><br><br>
				 
				 <button class="buttony" type="submit" name="submit">Update Password</button><br><br>
			  
   </form>

</center>


 <!--Footer-->
<footer class="footer_wrapper" id="contact">
  
  <div class="container">
    <div class="footer_bottom"><span>Developed By LakshmiNarayanan P. </span> </div>
  </div>
</footer>


</body>
</html>



