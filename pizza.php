<!DOCTYPE html>
<html>
<head>
	<title>PIZZA</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript">
		var pizzaID = <?php echo $_GET["pizza"];?>
	</script>

	
</head>
<body>
<div id="pageWrapper">
	<nav id="mainMenu">
		<h1><a href="index.html">DinPizza</a></h1>
		<img src="images/burger.png">
		<ul>
			<li>
				<a href="#">Pizza</a>
			</li>
			<li>
				<a href="#">kebab</a>
			</li>
			<li>
				<a href="#">falafel</a>
			</li>
			<li>
				<a href="#">om oss</a>
			</li>
			<li>
				<a href="#">samarbetande</a>
			</li>
		</ul>
	</nav>
	<main>
	<h2 id="namn"></h2>
	<ul id="pizzaIngredients">
	</ul>
	<ul id="pizzerior">
	</ul>

	</main>
	<!--<footer id="mainFooter">
		<ul>
			<li>kontakt</li>
		</ul>
	</footer>-->
</div>

	
	<script type="text/javascript" src="js/lib.js"></script>
	<script type="text/javascript" src="js/pizza.js"></script>
</body>
</html>