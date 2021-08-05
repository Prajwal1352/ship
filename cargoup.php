
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargo services</title>
</head>
<link rel="stylesheet" href="cargoUp.css" type="text/css">
<body>
	<button type="button" onClick="location.href='Home.php'">Home</button>
	
	<div cvn lass="dropdown">
  <button class="dropbtn">Admin</button>
  <div class="dropdown-content">
	<button type="a" onClick="location.href='cargoDe.php'">Delete</button></a>
  </div>
</div>
<form action="cargoup.php" class="box" method="post" name="Myform">
	<h1>Customer Update</h1>
	<hr>
	<div class="a">
    <font face="Times">Delivery status</font><input type="text" name="status" placeholder="">
		<br>
		<br>
		<br>
	<font face="Times">Sender_id</font><inn.
								put type="number" name="sid" placeholder="enter sender id">
		<br>
		<br>
		<br>
	
	</div>
		   <input type="submit" value="submit" name="submit">
	</form>
</body>
</html>
<?php
include_once 'db.php';
error_reporting(0);
$ds=$_POST['status'];
$si=$_POST['sid'];

$submit=$_POST;
if($submit)
{
	mysqli_select_db($conn,$db);
	$query1="UPDATE sender SET delivery_status='$ds',sid='$si' WHERE sid='$si'";
	if(mysqli_query($conn,$query1)){
		
	echo '<script>alert("Update Successfull");window.location.href="cargoup.php";</script>';
	}
}
