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
<h3 id="heading">VIEW BOOK DETAILS</h3>
  <?php
   $sql="SELECT * FROM book";
   $res=$db->query($sql);
   if($res->num_rows>0)
   {
	   echo "<table>
	   <tr>
	   <th>SNO</th>
	   <th>BOOK NAME</th>
	   <th>KEYWORDS</th>
	   <th>VIEW</th>
	   </tr>
	   ";
	             $i=0;
	         while($row=$res->fetch_assoc())
			 {
				 $i++;
				 echo "<tr>";
				 echo "<td>{$i}</td>";
				 echo "<td>{$row["BTITLE"]}</td>";
				 echo "<td>{$row["KEYWORDS"]}</td>";
				 echo "<td><a href='{$row["FILE"]}' target='_blank'>VIEW MATERIAL</a></td>";
				 echo "</tr>";
			 }
					   echo "</table>";
			
	     
   }
   else
   {
	   echo "<p class='error'>NO BOOKS FOUND</p>";
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