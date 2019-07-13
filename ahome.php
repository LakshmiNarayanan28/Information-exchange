<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
	$res=$db->query($sql);
	return $res->num_rows;
}
if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
}
	
?>



<html>
<head>
<title>IT INFORMATION EXCHANGE </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
<div id="header">
<center>
<h1>KLNCE IT DEPARTMENT-INFORMATION  EXCHANGE</h1>
</center>
</div>
<div id="wrapper">
<h3 id="heading">WELCOME ADMIN</h3>

<div id="center">
          <ul class="record">
		  <li>TOTAL STUDENTS: <?php echo countRecord("select * from student",$db); ?></li>
		  <li>TOTAL BOOKS/INFO: <?php echo countRecord("select * from book",$db); ?></li>
		  <li>TOTAL REQUEST: <?php echo countRecord("select * from request",$db); ?></li>
		  <li>TOTAL COMMENTS: <?php echo countRecord("select * from comment",$db); ?></li>
		 
		  </ul>
		  <h1>     </h1>
		  <img src="p.gif" alt="smiley face" width="170" height="170">
  </div>
</div>
<div id="navi">
<?php 
  include "adminSidebar.php";
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