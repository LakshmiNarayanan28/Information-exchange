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
<h3 id="heading">VIEW STUDENT DETAILS</h3>
  <?php
   $sql="SELECT * FROM student";
   $res=$db->query($sql);
   if($res->num_rows>0)
   {
	   echo "<table>
	   <tr>
	   <th>SNO</th>
	   <th>NAME</th>
	   <th>EMAIL</th>
	   <th>DEPARTMENT</th>
	   </tr>
	   ";
	             $i=0;
	         while($row=$res->fetch_assoc())
			 {
				 $i++;
				 echo "<tr>";
				 echo "<td>{$i}</td>";
				 echo "<td>{$row["NAME"]}</td>";
				 echo "<td>{$row["MAIL"]}</td>";
				 echo "<td>{$row["DEP"]}</td>";
				 echo "</tr>";
			 }
					   echo "</table>";
			
	     
   }
   else
   {
	   echo "<p class='error'>no records found</p>";
   }
  
  ?>

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