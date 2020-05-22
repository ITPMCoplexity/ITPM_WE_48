<?php

header('Content-Type: application/json');
include 'db.php';

$sqlQuery = "SELECT statFilename, statComplexity FROM statistics ORDER BY statFilename";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

echo json_encode($data);

?>
