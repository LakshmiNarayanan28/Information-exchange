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
<h3 id="heading">UPLOAD BOOKS AND INFO</h3>  

   <div id="center">
      <?php
	   if(isset($_POST["submit"]))
	   {
		   $target_dir="upload/";
		   $target_file=$target_dir.basename($_FILES["lakshmi"]["name"]);
		  
		   if(move_uploaded_file($_FILES["lakshmi"]["tmp_name"],$target_file))
		   {
			   $sql="insert into book(BTITLE,KEYWORDS,FILE) values ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
			   $db->query($sql);
			   echo "<p class='success'>UPLOADED SUCCESS..THANKYOU</p>";
		   }
		   else
		   {
			   echo "<p class='error'>UPLOAD ERROR TRY..</p>";
		   }
	   }
   ?>
   <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" >
       <b>   <label>BOOK TITLE</label></b>
		      <input type="text" name="bname" required>
			<b>  <label>KEYWORD</label></b>
			  <textarea name="keys" required></textarea>
		<b>	  <label>UPLOAD FILE</label></b>
			    <input type="file" name="lakshmi" required>
				   
			  
		         <button type="submit" name="submit">UPLOAD BOOKS</button>
			  
   </form>
   </div>

</div>
<div id="navi">
<?php 
  include "adminSidebar.php";
  ?>

</div>
<div id="footer">
</center>
<p>Copyright &copy;By LakshmiNarayanan</p>
</center>
</div>
</div>
</body>
</html>