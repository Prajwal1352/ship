<?php
$s=rand(1,1000);
$r=rand(1,1000);
$c=rand(1,1000);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargo Service Management </title>
	<link rel="stylesheet" href="Php/2.css">
</head>
<body>varient
	<button type="button" onClick="location.href='Home.php'" >Home</button>
	<button type="button" onClick="location.href='2.php'" >Cargo</button>
	<button type="button" onClick="location.href='8.php'" >My Orders</button>
	

	<hr>
	<br>

	<h1>&nbsp;&nbsp;&nbsp;&nbsp; SENDER DETAIL'S</h1>
	<br>
<form action="2.php" class="box" method="post" name="Myform" onSubmit="return id()">
	<br>
	<br>
	<br>
    <font face="Times">Senders Name:</font><input type="text" name="sname" placeholder="Enter sender name">
 <font face="Times"><br>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mobile No:</font>
	<input type="text" name="smno" placeholder="Enter mobile no" id="3">
	<br>
  <font face="Times">Email:</font><input type="text" name="semail" placeholder="Enter email">
	<br>
  <font face="Times">Address:</font><input type="text" name="sadr" placeholder="Enter address">
	<br>
  <font face="Times">City:</font><input type="text" name="scity" placeholder="Enter the city">
	<br>
	<font face="Times">State:</font><input type="text" name="sstate" placeholder="Enter the State">
	<br>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RECIEVER DETAIL'S</h2>
	  <font face="Times">Recievers Name:</font><input type="text" name="rname" placeholder="Enter Reciver name">
  <font face="Times"><br>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mobile No:</font>
	<input type="text" name="rmno" placeholder="Enter mobile no" id="3">
	<br>
  <font face="Times">Email:</font><input type="text" name="remail" placeholder="Enter email">
	<br>
  <font face="Times">Address:</font><input type="text" name="radr" placeholder="Enter address">
	<br>
  <font face="Times">City</font><input type="text" name="rcity" placeholder="Enter the city">
	<br>
	<font face="Times">State:</font><input type="text" name="rstate" placeholder="Enter the State">
	<br>
	<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CARGO DETAIL'S</h3>
	  <font face="Times">Weight:</font><input type="text" name="weight" placeholder="Enter the weight">
  <font face="Times"><br>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Length:</font>
	<input type="text" name="len" placeholder="Enter the length" id="3">
	<br>
  <font face="Times">Width:</font><input type="text" name="wid" placeholder="Enter the width">
	<br>
  <font face="Times">Height:</font><input type="text" name="hei" placeholder="Enter the height">
	<br>
  <font face="Times">Quantity;</font><input type="text" name="qua" placeholder="Enter the Quantity">
	<br>
	<font face="Times">Type:</font><input type="text" name="typ" placeholder="(document,electronics,mechanics,liquids,clothes)">
	<br>
	<input type="hidden" name="sid" value="<?php echo $s?>">
	<input type="hidden" name="rid" value="<?php echo $r?>">
	<input type="hidden" name="cid" value="<?php echo $c?>">
	<input type="submit" value="Proceed" name="Proceed">
	</form>
    </body>
    </html>
<?php 
	
include_once 'db.php';
error_reporting(0);
$sid=$_POST['sid'];
$rid=$_POST['rid'];
$cid=$_POST['cid'];
$sname=$_POST['sname'];
$smno=$_POST['smno'];
$semail=$_POST['semail'];
$sadr=$_POST['sadr'];
$scity=$_POST['scity'];
$sstate=$_POST['sstate'];
$rname=$_POST['rname'];
$rmno=$_POST['rmno'];
$remail=$_POST['remail'];
$radr=$_POST['radr'];
$rcity=$_POST['rcity'];
$rstate=$_POST['rstate'];
$weight=$_POST['weight'];
$len=$_POST['len'];
$wid=$_POST['wid'];
$hei=$_POST['hei'];
$qua=$_POST['qua'];
$typ=$_POST['typ'];
		   
		   $submit=$_POST;
		   $query4="SELECT * FROM sender";
		   $query5="SELECT * FROM reciever";
		    $query6="SELECT * FROM cargo_details";
		   $result=mysqli_query($conn,$query4);
		   $result1=mysqli_query($conn,$query5);
		   $result2=mysqli_query($conn,$query6);
		   
		   
		   if(mysqli_num_rows($result)>0)
		   {
			   $i=0;
			   
			   while($row=mysqli_fetch_array($result))
			   {
				   if($row['sid']==$sid)
				   {
					   $sid=rand($row['sid']+1,1000);
				   }
				   $i++;
				  
			   }
		   }
		   
		   if(mysqli_num_rows($result1)>0)
		   {
			   $i=0;
			   
			   while($row1=mysqli_fetch_array($result1))
			   {
				   if($row1['rid']==$rid)
				   {
					   $rid=rand($row1['rid']+1,1000);
				   }
				   $i++;
				  
			   }
		   }
		   
		   if(mysqli_num_rows($result2)>0)
		   {
			   $i=0;
			   
			   while($row2=mysqli_fetch_array($result2))
			   {
				   if($row2['cid']==$cid)
				   {
					   $cid=rand($row2['cid']+1,1000);
				   }
				   $i++;
				  
			   }
		   }
		   
		   
		   
if($submit){
	session_start();
	$var_value=$_POST['sid'];
		   $var_value1=$_POST['rid'];
		   $var_value2=$_POST['cid'];
	$var_value3=$_POST['weight'];
		   $var_value4=$_POST['qua'];
		   $var_value5=$_POST['hei'];
	$var_value6=$_POST['wid'];
		   $var_value7=$_POST['len'];
		   
$_SESSION['sid']=$var_value;
	$_SESSION['rid']=$var_value1;
	$_SESSION['cid']=$var_value2;
	$_SESSION['weight']=$var_value3;
	$_SESSION['qua']=$var_value4;
	$_SESSION['hei']=$var_value5;
	$_SESSION['wid']=$var_value6;
	$_SESSION['len']=$var_value7;
	
	mysqli_select_db($conn,$db);
	$query="INSERT INTO sender (sname,smno,semail,sadr,scity,sstate,sid)
	VALUES ('$sname','$smno','$semail','$sadr','$scity','$sstate','$sid')";
		$query1="INSERT INTO receiver (rname,rmno,remail,radr,rcity,rstate,rid)
	VALUES ('$rname','$rmno','$remail','$radr','$rcity','$rstate','$rid')";
		$query2="INSERT INTO cargo_details (weight,length,width,height,quantity,cid,type)
	VALUES ('$weight','$len','$wid','$hei','$qua','$cid','$typ')";
	$query3="ALTER TABLE cargo_details ADD type varchar(50) NOT NULL";
	if(mysqli_query($conn,$query3)){
	}
	 if(mysqli_query($conn,$query) && mysqli_query($conn,$query1) && mysqli_query($conn,$query2)){
		echo '<script>alert("");window.location.href="5.php";</script>';
	}

}
?>