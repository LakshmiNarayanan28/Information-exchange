<?php
session_start();
 include "database.php"
 
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
<h3 id="heading">ADMIN LOGIN HERE..</h3>
<div id="center">
            <?php
			if(isset($_POST["submit"]))
			{
				 $sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
				  $res=$db->query($sql);
				  if($res->num_rows>0)
				  {
					  $row=$res->fetch_assoc();
					  $_SESSION["AID"]=$row["AID"];
					  $_SESSION["ANAME"]=$row["ANAME"];
					  header("location:ahome.php");
				  }
				  else
				  {
					  echo "<p class='error'>Invalid user details</p>";
				  }
			}
			?>

<form action="alogin.php" method="post">
  <b><label>USER NAME</label></b>
  <input type="text" name="aname" required>
  <b><label>PASSWORD</label></b>
  <input type="password" name="apass" required>
     <button type="submit" name="submit">
	 Login now
	 </button>
  </form>
  </div>
</div>
<div id="navi">
<?php 
  include "sidebar.php";
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