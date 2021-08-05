
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargo service</title>
</head>
<link rel="stylesheet" href="cargoDe.css" type="text/css">
<body>
	<button type="button" onClick="location.href='Home.php'">Home</button>
	<div class="dropdown">
  <button class="dropbtn">Admin</button>
  <div class="dropdown-content">
<button type="a" onClick="location.href='cargoUp.php'">Update</button></a>
  </div>
</div>
<form action="cargoDe.php" class="box" method="post" name="Myform">
	<h1><b>Customer & Cargo Management</b></h1>
	<hr>
	<div class="a">
	<font face="Times">Sender_id:</font><input type="number" name="sid" placeholder="enter sender id">
		<br>
		<br>
		<font face="Times">reciever_id:</font><input type="number" name="rid" placeholder="enter reciever id">
		<br>
		<br>
		<font face="Times">Cargo_id:</font><input type="number" name="cid" placeholder="enter Cargo id">
	</div>
		  <input type="submit" value="submit" name="submit">
	</form>

</body>
</html>
<?php
include_once 'db.php';
error_reporting(0);
$si=$_POST['sid'];
$ri=$_POST['rid'];
$ci=$_POST['cid'];
$submit=$_POST;
$db="cargo";
if($submit)
{
	mysqli_select_db($conn,$db);
	$query1="DELETE FROM sender WHERE sid='$si'";
	$query2="DELETE FROM receiver WHERE rid='$ri'";
	$query3="DELETE FROM cargo_details WHERE cid='$ci'";
	if(mysqli_query($conn,$query1) && mysqli_query($conn,$query2) && mysqli_query($conn,$query3))
	{
		
	echo '<script>alert("Value Deleted");window.location.href="cargoDe.php";</script>';
	}
}
