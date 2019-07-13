<?php

include "database.php";


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
<h3 id="heading">ENJOY AND DEVOLOP THE KNOWLEDGE</h3>  

   <div id="center">
      <?php
	   if(isset($_POST["submit"]))
	   {
		   
			   $sql="insert into student(NAME,PASS,MAIL,DEP) values ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}'
			   ,'{$_POST["dep"]}')";
			   $db->query($sql);
			   echo "<p class='success'>REGISTRATION SUCCESS..THANKYOU</p>";
		   		   
	   }
   ?>
   <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" >
         <b> <label>NAME</label></b>
		      <input type="text" name="name" required>
			<b>  <label>PASSWORD</label></b>
			  <input type="password" name="pass" required>
			  
			<b>  <label>Email-ID</label></b>
			  <input type="email" name="mail" required>
			  <select name="dep" required>
			                   <option value="">Select</option>
							    <option value="First Year">First Year</option>
								<option value="Second Year">Second Year</option>
								<option value="Third Year">Third Year</option>
								<option value="Fourth Year">Fourth Year</option>
								 
								   </select>
								  
			  
			  
				   
			  
		         <button type="submit" name="submit">Register</button>
			  
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