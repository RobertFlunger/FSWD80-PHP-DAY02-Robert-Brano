<?php
echo ("<html><body>");
include 'access.php';

$conn = localConnect("localhost", "root", "", "testdb");

/*Insert into DB from user input */

$last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
$first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

$table = "users";
$sql = "INSERT INTO $table (lastName, firstName, email, phone)
	VALUES ('$last_name', '$first_name', '$email', '$phone')";

if (mysqli_query($conn, $sql)) {
	echo "<h1>New record created!</h1>";
} else {
	echo "<h1>Record creation error for: </h1>" 
	. "<p>" . $sql . "</p>" . mysqli_error($conn);
}

$colnames = array("lastName, firstName, email, phone");

createTable(runQuery($colnames, $table));

mysqli_close($conn);
echo "</body></html>";
?>