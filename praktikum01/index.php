<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Väike lehekülg</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
	<?php
	echo phpversion();
	?>
	<p>Tere! Ma ei viitsi praegu mingit teksti välja mõelda.</p>
	<br>
	<img src="pics/pilt.jpg">

	<br>

	<p id="aeg"></p>
	
	<script>
	var current = new Date();
	var end = new Date("February 11, 2017 16:30:00");
	document.getElementById('aeg').innerHTML = (end-current)/1000;
	</script>




	</body>
</html>
