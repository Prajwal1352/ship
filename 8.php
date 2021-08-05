<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargo service</title>
<link rel="stylesheet" href="8.css" type="text/css">
	</head>
<body>
	<button type="button" onClick="location.href='Home.php'">Home</button>
	<button type="button" onClick="location.href='2.php'">cargo</button>
	<button type="button" onClick="location.href='4.php'">Pricing</button>
	<button type="button" onClick="location.href='about.php'">About US</button>
<form action="8.php" method="post">
	<font face="Times">Customer ID:</font><input type="text" placeholder="Enter customer Id" name="sid">
	<input type="submit" value="submit" name="submit">
	</form>

<?php
include_once 'db.php';
error_reporting(0);
$sid=$_POST['sid'];
$submit=$_POST;
$query="SELECT * FROM sender WHERE sid='$sid'";
$result=mysqli_query($conn,$query);
mysqli_select_db($conn,$db);
if($submit)
{
	if(mysqli_num_rows($result) > 0)
	{
		$i=0;
		while($row = mysqli_fetch_array($result))
		{
			?>
	<font face="Times">Delivery Status</font>
	<input type="text" name="delivery" value="<?php echo $row['delivery_status']?>">
	<?php 
				$i++;
		}
	}
	else {
		echo '<script>alert("Invalid Customer ID");window.location.href="2.php";</script>';
	}
}
?>
	</body>
</html>