<?php
$server="localhost";
$user="root";
$pwd="";
$db="cargo";
$conn=mysqli_connect($server,$user,$pwd,$db);
if(!$conn){
	die('connection unsuccessfull'. mysqli_error());
}