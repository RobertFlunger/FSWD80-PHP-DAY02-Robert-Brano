<html>
<head>

</head>
<body>

<?php

function localConnect($servername, $user, $password, $dbname) {

	$servername = $servername; #127.0.0.1
	$username = $user;
	$password = $password;
	$dbname = $dbname;

	// Create connection
	$conn = @new mysqli($servername, $username, $password, $dbname);

	#or: $conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) { # or: if(!$conn)
		die("Connection failed: " . $conn->connect_error);
	}

	return $conn;
}

function fetchMysql($result) {

	if($result->num_rows == 1){
		$rows = $result->fetch_assoc();
	} elseif($result->num_rows == 0) {
		$rows = "No result";
	} else {
		$rows = $result->fetch_all(MYSQLI_ASSOC);
	}
	return $rows;
}

function runQuery($col="*",$table, $join="", $where="", $group="", $order="")
{
	$cols = implode(", ", $col);
	$joins = implode(PHP_EOL, $join);

	$sql = "SELECT $cols FROM $table $joins $where $group $order";

	global $conn;
	$result = mysqli_query($conn, $sql);
	/*$result = $conn -> query($sql);*/
	$rows = fetchMysql($result);
	return $rows;
}

function is_multidimensional($array) {
    return count($array) !== count($array, COUNT_RECURSIVE);
}

function createOneDimensional($array) {
	foreach($array as $key => $values) {
			echo "<th scope='col'>$key</th>";
	}
	
	echo "</tr></thead><tbody>";
	
	foreach($array as $key => $values) {
		echo "<td scope='col'>$array[$key]</td>";
	}
	echo "</tr></tbody>";
}

function createMultiDimensional($array) {
	foreach($array[0] as $key => $values) {
				echo "<th scope='col'>$key</th>";	
	}

	echo "</tr></thead><tbody>";

	foreach($array as $key => $row) {
		foreach( $row as $key2 => $value2) {
			echo "<td scope='col'>$row[$key2]</td>";
		}
	echo "</tr></tbody>";
	}
}

function createTable($result) {

	$rows = $result;
	/*echo gettype($rows);
	print_r($rows);*/

	echo "<table class='table'><thead class='thead-light'><tr>";
	
	if (is_multidimensional($rows) == false) {
		createOneDimensional($rows);
		}
	else {
		createMultiDimensional($rows);
	}
}


?>

</body>