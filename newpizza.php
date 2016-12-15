<?php
	include("./php/config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nya pizzor</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="/pizza/js/lib.js"></script>
	<script type="text/javascript" src="/pizza/js/newpizza.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	<label for="pizzaNamn">Namn</label>
	<input type="text" name="pizzaNamn" id="namn">
	<div id="ingredienser">
	</div>

	<button id="save">spara</button>
</body>
</html>
