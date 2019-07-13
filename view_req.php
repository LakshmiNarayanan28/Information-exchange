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
<h3 id="heading">VIEW REQUEST DETAILS</h3>
  <?php
   $sql="SELECT STUDENT.NAME,request.MES,request.LOGS from STUDENT inner join request on STUDENT.ID=request.ID";
   
   $res=$db->query($sql);
   if($res->num_rows>0)
   {
	   echo "<table>
	   <tr>
	   <th>SNO</th>
	   <th>NAME</th>
	   <th>MESSAGE</th>
	   <th>LOGS</th>
	   </tr>
	   ";
	             $i=0;
	         while($row=$res->fetch_assoc())
			 {
				 $i++;
				 echo "<tr>";
				 echo "<td>{$i}</td>";
				 echo "<td>{$row["NAME"]}</td>";
				 echo "<td>{$row["MES"]}</td>";
				 echo "<td>{$row["LOGS"]}</td>";
				 echo "</tr>";
			 }
					   echo "</table>";
			
	     
   }
   else
   {
	   echo "<p class='error'>NO MATERIALS REQUESTS FOUND</p>";
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
<p>Copyright &copy;By LakshmiNarayanan</p>
</center>
</div>
</div>
</body>
</html>