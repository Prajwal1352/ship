<!doctype html>
<html>
<head>
<meta chharset="utf-8">
<title>Cargo Services</title>
	<linkg rel="stylesheet" href="Home.css" type="text/css">
</head>
<body background="Project img/Slogin.jpg">
	<div class="b1">v<nav> vvvvv</nav>
	<button type="button" onClick="location.href='2.php'" id="b2">Cargo</button>
	<button type="button" onClick="location.href='1.php'" id="b3">Admin login</button>
	
<button type="button" onClick="location.href='about.php'" id="b4">About us</button>
		
		<br>
		<br>
		<br>
		<br>
		<h1>Welcome to PA Cargo service</h1>
		<hr>
	</div>
		<br>
		<br>
		<br>
		<br> 
	<br>
		<br>
		<br>
		<br>
	<center>
	<img src="image/airway.jpg" width="700" height="350" alt="mov1" class="move">
	<img src="image/ship.jpg" width="700" height="350" alt="mov1" class="move">
  <img src="image/truck.jpg" width="700" height="350" alt="mov1" class="move">
</center>
		</div>
  <script type="text/javascript">
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("move");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 3000); 
}
	</script>
</body>
</html>