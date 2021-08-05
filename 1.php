<!doctype html>

<html>mjx>
<head>
<meta charset="utf-8">
<title>Cargo Service</title>
	<link rel="stylesheet" href="Php/1.css">
	</head>
<body>
	<button type="button" onClick="location.href='Home.php'">Home</button>
	<button type="button" onClick="location.href='2.php'">cargo</button>
	<button type="button" onClick="location.href='8.php'">My Order</button>
	<button type="button" onClick="location.href='4.php'">Pricing</button>
	<button type="button" onClick="location.href='about.php'">About US</button>
	<form class="box" action="1.php" method="post" name="Myform" onSubmit="return validateform();">
		<h1>Admin  Login</h1>
		<input type="text" name="Admin" placeholder="admin_id" id="Dloc">
		<input type="text" name="pwd" placeholder="password" id="Ploc">
		<input type="submit" value="submit" name="submit">
	</form>
</body>
</html>
<?php
include_once 'db.php';
error_reporting(0);
$submit=$_POST;
$pwd=$_POST['pwd'];
$lid=$_POST['Admin'];
$query="SELECT * FROM admin_login";
mysqli_select_db($conn,$db);
$result=mysqli_query($conn,$query);
if($submit){
	if(empty($_POST["Admin"]) && empty($_POST["pwd"])){
		echo '<script>alert("Admin username and password empty");</script>';
	}
	else if(empty($_POST["Admin"])){
		echo '<script>alert("Admin username");</script>';
	}
	else if(empty($_POST["pwd"])){
		echo '<script>alert("password empty");</script>';
	}
	if(mysqli_num_rows($result) > 0)
{
	$i=0;
	while($row = mysqli_fetch_array($result))
	{
		
		if($row['Admin_id']==$lid && $row['password']==$pwd)
		{
			echo '<script>alert("login successfull");window.location.href="cargoup.php";</script>';
		}
		$i++;
 }
	
	}
	else {
		echo '<script>alert("unsuccessful login check id/password");window.location.href="1.php";</script>';
			
	}
}

	
?>

