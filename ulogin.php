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
<h3 id="heading">USER LOGIN HERE..</h3>
<div id="center">
            <?php
			if(isset($_POST["submit"]))
			{
				 $sql="SELECT * FROM student where NAME='{$_POST["name"]}' and PASS='{$_POST["pass"]}'";
				  $res=$db->query($sql);
				  if($res->num_rows>0)
				  {
					  $row=$res->fetch_assoc();
					  $_SESSION["ID"]=$row["ID"];
					  $_SESSION["NAME"]=$row["NAME"];
					  header("location:uhome.php");
				  }
				  else
				  {
					  echo "<p class='error'>Invalid user details</p>";
				  }
			}
			?>

<form action="ulogin.php" method="post">
  <label><b>USER NAME</b></label>
  <input type="text" name="name" required>
  <label><b>PASSWORD</b></label>
  <input type="password" name="pass" required>
     <b><button type="submit" name="submit">
	 Login now
	 </button>
	 </b>
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