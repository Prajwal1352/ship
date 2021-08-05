<?php
error_reporting(0);
include_once 'db.php';
session_start();
$var_value=$_SESSION['sid'];
$var_value1=$_SESSION['rid'];
$var_value2=$_SESSION['cid'];
$var_value3=$_SESSION['weight'];
$var_value4=$_SESSION['qua'];
$var_value5=$_SESSION['hei'];
$var_value6=$_SESSION['wid'];
$var_value7=$_SESSION['len'];
$s=$_SESSION['sid'];
$r=$_SESSION['rid'];
$c=$_SESSION['cid'];
$weight=$_SESSION['weight'];
$qua=$_SESSION['qua'];
$hei=$_SESSION['hei'];
$wid=$_SESSION['wid'];
$len=$_SESSION['len'];
mysqli_select_db($conn,$db);
$query1="SELECT * FROM sender WHERE sid='$s'";
$query2="SELECT * FROM receiver WHERE rid='$r'";
$query3="SELECT * FROM cargo_details WHERE cid='$c'";
$result1=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);
$result3=mysqli_query($conn,$query3);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargo Managament</title>
	<link rel="stylesheet" href="5.css">
</head>
	<body>
<form class="box">
<table id="customer">
  <tr>
    <th>sname</th>
	  <th>smno</th>
	  <th>email</th>
	   <th>sadr</th>
	  <th>scity</th>
	  <th>sstate</th>
	  <th>sid</th>
     </tr>
	<?php
	 if(mysqli_num_rows($result1) > 0 )
{
	$i=0;
	 while($row = mysqli_fetch_array($result1)){
		 
?>
  <tr>
    <td><?php echo $row['sname']?></td>
    <td><?php echo $row['smno']?></td>
   <td><?php echo $row['semail']?></td>
	  <td><?php echo $row['sadr']?></td>
	  <td><?php echo $row['scity']?></td>
	  <td><?php echo $row['sstate']?></td>
	  <td><?php echo $row['sid']?></td>
	</tr>
		<?php 
			 $i++;
	 }
 }
else
{
	echo "not found";
}
?>
</table>

	</form>
	
	<br>
	<br>

<form class="table">
	<table id="customer1">	
<tr>
	<th>rname</th>
	  <th>rmno</th>
	<th>email</th>
	   <th>radr</th>
	  <th>rcity</th>
	  <th>rstate</th>
	  <th>rid</th>
     </tr>
	<?php 
		if(mysqli_num_rows($result2)){
			$i=0;
			while($row1 = mysqli_fetch_array($result2))
			{
				?>
  <tr>
    <td><?php echo $row1['rname']?></td>
    <td><?php echo $row1['rmno']?></td>
	<td><?php echo $row1['remail']?></td>
	  <td><?php echo $row1['radr']?></td>
	  <td><?php echo $row1['rcity']?></td>
	  <td><?php echo $row1['rstate']?></td>
	  <td><?php echo $row1['rid']?></td>
		</tr>
		<?php
					$i++;
			}
		}
		else{
			echo "not found";
		}
		?>
		
</table>
	
	</form>
	
	<br>
	<br>
	<br>
	
	<form class="volume">
		<table id="volume">	
			<th>weight</th>
	  <th>length</th>
	   <th>width</th>
	  <th>height</th>
	  <th>quantity</th>
	  <th>type</th>
			<th>cid</th>
	<?php 
		if(mysqli_num_rows($result3) > 0){
			$i=0;
			while($row2 = mysqli_fetch_array($result3))
			{
				?> 
  <tr>
    <td><?php echo $row2['weight']?></td>
    <td><?php echo $row2['length']?></td>
	  <td><?php echo $row2['width']?></td>
	  <td><?php echo $row2['height']?></td>
	  <td><?php echo $row2['quantity']?></td>
	  <td><?php echo $row2['type']?></td>
	  <td><?php echo $row2['cid']?></td>
			</tr>
			<?php
				$i++;
			}
		}
		else{
			echo "not found";
		}
		?>
	</table>
		<?php
		$t=0.75;
		if($weight<=5)
		{
			$w=100;
		}
		if($weight>5 && $weight<=10)
		{
			$w=500;
		
		}
		if($weight>10 && $weight<=20)
		{
			$w=1000;
		
		}
		if($weight>20 && $weight<1000)
		{
			
			$w=1500;
			$w=$w+$weight*$t;
			
		}
		$r=$w*$qua;
		?>
		
			<h1>Total Price =</h1><input type="text" name="amt" value="<?php echo $r ?>">
		<?php
	$var_value8=$r;
	$_SESSION['amt']=$var_value8;
	?>	
		</form>
		<form class="button" action="5.php" method=post>
			<input type="submit" value="Proceed" name="submit">
	<br>
	<br>
				

</body>
</html>
	<?php
	
	$submit=$_POST;
	if($submit)
	{
		echo '<script>alert("Make payment");window.location.href="Payment cus.php";</script>';
		
	}
	?>