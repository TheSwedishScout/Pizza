<?php
include("function.php");
include('config.php');

$pizzas = [];
class pizza{
	public $id;
	public $name;
	public $ingredientsID = [];
	public $ingredients = [];
	public $pizzerior;
	

	public function __construct($id,$name, $pizzerior){

		$this->id = $id;
		$this->name = $name;
		$this->pizzerior = $pizzerior;
	}
	public function ingredientsIn($idn, $names){
		$this->ingredientsID[] = $idn;
		$this->ingredients[] = $names;
	}

}

$pizzaID = test_input($_GET["pizza"]);
//$sqlPizzerior = "SELECT pizzor.namn, pizzerior.name, pizzerior.opening, pizzerior.closing FROM pizzor, pizzerior, pizzor_in_pizzerias WHERE pizzor.id = $pizzaID AND pizzor.id = pizzor_in_pizzerias.pizza AND pizzor_in_pizzerias.pizzeria = pizzerior.name;";


/* Prepared statement, stage 1: prepare */
if (!($stmt = $conn->prepare("SELECT pizzor.namn as pizza, pizzerior.name AS pizzeria, pizzerior.opening AS opening, pizzerior.closing AS closing FROM pizzor, pizzerior, pizzor_in_pizzerias WHERE pizzor.id = ? AND pizzor.id = pizzor_in_pizzerias.pizza AND pizzor_in_pizzerias.pizzeria = pizzerior.name;"))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */
$id = 1;
if (!$stmt->bind_param("i", $pizzaID)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
if (!($res = $stmt->get_result())) {
    echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
}
class pizzeria{
	public $name;
	public $opening;
	public $closing;

	public function __construct($name,$opening, $closing){

		$this->name = $name;
		$this->opening = $opening;
		$this->closing = $closing;
	}
}
$pizzerior = [];
if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
    	//echo $row3['id'] ." = ".$row3['namn']."<br>";
    	$pizzerior[] = new pizzeria($row["pizzeria"],$row["opening"], $row["closing"]);
    	$namn = $row["pizza"];
    }
}
$pizzas[]= new pizza($pizzaID,$namn , $pizzerior);



for ($i=0; $i < count($pizzas); $i++) { 
	
	/* Prepared statement, stage 1: prepare */
	if (!($stmt = $conn->prepare("SELECT ingredienser.namn, ingredienser.id FROM ingrediens_lista, ingredienser, pizzor WHERE pizzor.id = ? AND ingredienser.id = ingrediens_lista.ingrediens AND ingrediens_lista.pizza = pizzor.id;"))) {
	     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	/* Prepared statement, stage 2: bind and execute */
	$id = 1;
	if (!$stmt->bind_param("i", $pizzas[$i]->id)) {
	    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	if (!$stmt->execute()) {
	    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	if (!($res = $stmt->get_result())) {
	    echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	if ($res->num_rows > 0) {
	    // output data of each row
	    while($row = $res->fetch_assoc()) {
			$pizzas[$i]->ingredientsIn($row["id"],$row["namn"]);
	    }
	}
}

/*foreach($pizzas as $key=>$value){
  echo $value->getNames($associativeArray);
}
*/
//var_dump($pizzas);
//var_dump($matchande_ingredienser);

$json = json_encode($pizzas, JSON_UNESCAPED_UNICODE);


$conn->close();
print_r($json);



?>