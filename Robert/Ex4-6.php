<html>
<head>
	<title>Exercise 4: Database</title>
</head>
<body>


<?php

include 'access.php';
$conn = localConnect("localhost", "root", "", "");

$newdb = "testdb";

$sql = "CREATE DATABASE $newdb";

if (mysqli_query($conn, $sql)) {
	echo "Database $newdb created succesfully! \n";
} else {
	echo "Error creating database $newdb : " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
unset($conn);
unset($sql);

$conn = localConnect("localhost", "root", "", "testdb");

/*Create Table and insert Data */

$newTable = "Users";

$sql = "CREATE TABLE $newTable (
		ID SMALLINT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		lastName VARCHAR(25) NOT NULL,
		firstName VARCHAR(25) NOT NULL,
		email VARCHAR(60) NOT NULL,
		phone VARCHAR(30) NOT NULL,
		reg_date TIMESTAMP
	)";

if (mysqli_query($conn, $sql)) {
	echo "Table $newTable created succesfully! \n";
	} else {
		echo "Error creating table: " . mysqli_error($conn) . "\n";
	}

unset($sql);
$sql = "INSERT INTO $newTable (lastName, firstName, email, phone)
	VALUES ('Lorem', 'Ipsum', 'lorem@ipsum.com', '+420420420')";

if (mysqli_query($conn, $sql)) {
	echo "New record created! \n";
} else {
	echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
}

// Escape user inputs for security


mysqli_close($conn);

?>

</body>
</html>