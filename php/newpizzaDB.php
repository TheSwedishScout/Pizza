<?php
include("function.php");
include('config.php');

if (isset($_GET['namn'])) {
	$pizzansNamn = test_input($_GET['namn']);

	$sql = "INSERT INTO `pizzor` (`id`, `namn`) VALUES (NULL, '$pizzansNamn');";
	$conn->query($sql);
	$pizzansID = $conn->insert_id;
	

	if (isset($_GET['ingredients'])) {
		$ingrediens = test_input($_GET['ingredients']);
		$ingrediens = explode(",", $ingrediens);
		foreach ($ingrediens as $key => $value) {
			
			$sql2 = "INSERT INTO `ingrediens_lista` (`id`, `pizza`, `ingrediens`) VALUES (NULL, '$pizzansID', '$value');";
			$conn->query($sql2);
		}
	}

	// normal JSON string
    header('Content-Type: application/json; charset=utf8');

    print json_encode($pizzansNamn);

	
}
$conn->close();
?>