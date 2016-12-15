<?php
include("function.php");
include('config.php');

$sql = "SELECT * FROM `ingredienser` ORDER BY `ingredienser`.`namn` ASC";
$rows = [];
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$rows[] = $row;
	    }
	} else {
	    echo "0 results";
	}
	//N-y ingrediens

	$conn->close();
	print json_encode($rows, JSON_UNESCAPED_UNICODE);
?>