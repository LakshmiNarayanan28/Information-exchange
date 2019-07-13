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
<link rel="stylesheet" type="text/css" href="animate.css">
</head>
<body>
<div id="container">
<div id="header">
<center>
<h1>KLNCE IT DEPARTMENT-INFORMATION EXCHANGE</h1>
</center>
</div>
<div id="wrapper">
<h3 id="heading">WELCOME <?php echo $_SESSION["NAME"];?></h3>
<center>
<img src="p.gif" alt="smiley face" width="200" height="200">
<h2 class="animated flash infinite">"I AM SAY UPDATE YOUR KNOWLEDGE REGULARLY"</h2>
</center>
</div>
<div id="navi">
<?php 
  include "userSidebar.php";
  ?>

</div>
<div id="footer">
<center>
<p>Copyright &copy;By LakshmiNarayanan>
</center>
</div>
</div>
</body>
</html>