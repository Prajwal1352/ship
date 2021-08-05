<?php
include_once 'db.php';
session_start();
$var_value8=$_SESSION[$r];
$r=$_SESSION[$r];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Automobile Sales</title>
<link rel="stylesheet" href="Payment.css" type="text/css">
	</head>
<body>
	<h1>Payment Mode</h1>
	<hr>
	<form class="box" action="Payment.php" method="post">
		
		<input type="checkbox" value="Debit" name="debit"><font face="Times">Debit Card <input type="checkbox" value="Credit Card" name="credit"><font face="Times">Credit Card
	<br>
		<br>
		<div class="b">
	<font face="Times">Debit/Credit Card No:</font><input type="text" name="cno" placeholder="Enter Card No">	
		<br>
		<br>
	<font face="Times">CVV:</font><input type="text" name="cvv" placeholder="Enter CVV">
		<br>
		<br>
	<font face="Times">Expiry Date:</font><input type="text" name="exp" placeholder="Enter Expiry Date">
		<br>
		<br>
			</div>
			<div class="c">
		<font face="Times">Card Holder Name:</font><input type="text" name="cname" placeholder="Enter Name">
			<br>
			<br>
				
		<font face="Times">Amount</font><input type="text" name="amt" value="<?php echo $r ?>">

	</div>
		<br>
		<input type="submit" value="PayNow" name="submit">
			</form>
</body>
</html>
	<?php
	include_once 'db.php';
	error_reporting(0);
	$debit=$_POST['debit'];
	$credit=$_POST['credit'];
	$cno=$_POST['cno'];
	$cvv=$_POST['cvv'];
	$exp=$_POST['exp'];
	$cname=$_POST['cname'];
	$amt=$_POST['amt'];
	$submit=$_POST;
	$pid=rand(1,1000);
	$query3="SELECT * FROM payment";
    $result1=mysqli_query($conn,$query3);
	if(mysqli_num_rows($result1) > 0)
	{
		$i=0;
		while($row1 = mysqli_fetch_array($result1))
		{
			if($row1['pid']==$pid)
			{
				$pid=rand($row1['pid']+1,1000);
			}
			$i++;
		}
		
	}
	if($submit && isset($_POST['debit']))
	{
		mysqli_select_db($conn,$db);
		$query1="INSERT INTO payment (payment_mode,card_no,cvv,expiry_date,name,amount,payment_id)
		VALUES ('$debit','$cno','$cvv','$exp','$cname','$amt','$pid')";
		if(mysqli_query($conn,$query1))
		{
			echo '<script>alert("Payment Successfull");window.location.href="Home.php";</script>';
		}
	}
	else if($submit && isset($_POST['credit']))
	{
		mysqli_select_db($conn,$db);
		$query2="INSERT INTO payment (payment_mode,card_no,cvv,expiry_date,name,amount,payment_id)
		VALUES ('$credit','$cno','$cvv','$exp','$cname','$amt','$pid')";
		if(mysqli_query($conn,$query2)){
			echo '<script>alert("Payment Successfull");window.location.href="Home.php";</script>';
		}
	}
	mysqli_close($conn);
?>
	
	
	