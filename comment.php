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
<h3 id="heading">GIVE YOUR COMMENT</h3>  

   
   <?php
   if(isset($_POST["submit"]))
	   {
		   
			   $sql="INSERT INTO comment(BID,SID,COMM,LOGS) VALUES ({$_GET["id"]},{$_SESSION["ID"]},
				   '{$_POST["mahakaali"]}',now()) ";
			   
			   $db->query($sql);
			   
		   		   
	   }
        $sql="SELECT * from BOOK where BID=".$_GET["id"];
	               $res=$db->query($sql);
				      if($res->num_rows>0)
					  {
						  echo "<table>";
						    $row=$res->fetch_assoc();
							echo "<tr>
							   <th>BOOK NAME</th>
							   <td>{$row["BTITLE"]}</td>
							</tr>
							<tr>
							  <th>KEYWORDS</th>
							  <td>{$row["KEYWORDS"]}</td>
							</tr>
							";
							echo "</table>";
					  }
					  else
					  {
						     echo "<p class='error'>NO BOOKS FOUND</p>";
					  }
      ?>

   	  <div id="center">
	  
              <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
			  <p>     </p>
<b><label>YOUR COMMENTS</label></b>
<textarea name="mahakaali" required></textarea>
 <button type="submit" name="submit">Post Now</button>
</form>			  

   
         </div>
		 
		 <?php
		 
		 $sql="SELECT student.NAME,comment.COMM,comment.LOGS from comment inner join student on comment.SID=student.ID 
		 where comment.BID={$_GET["id"]} order by comment.CID desc";

		 $res=$db->query($sql);
		 if($res->num_rows>0)
		 {
			 while($row=$res->fetch_assoc())
			 {
				 echo "<p><strong>{$row["NAME"]}:</strong>{$row["COMM"]}
				 <i>{$row["LOGS"]}</i>
				 </p>";
			 }
		 }
		 else
		 {
			 echo "<p class='error'>No Comments Yet Given...</p>";
		 }
		 ?>
		 <div id="center">

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