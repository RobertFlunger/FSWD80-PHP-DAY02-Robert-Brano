<?php
echo ("<html><body>");
include 'access.php';

$conn = localConnect("localhost", "root", "", "testdb");

/*Insert into DB from user input */

$id = mysqli_real_escape_string($conn, $_POST['id']);
$id2 = mysqli_real_escape_string($conn, $_POST['id2']);
$last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
$first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
/*$submit = mysqli_real_escape_string($conn, $_POST['submit']);*/

$table = "users";

if($_POST['submit'] == 'Update'){

	$queries = array('lastName'=>$last_name, 'firstName'=>$first_name, 'email'=>$email, 'phone'=>$phone);

	foreach($queries as $index=>$elem) {
		if(empty($elem) == false){
		$update[] = "$index = '$elem'";
		}
	}

	$update = implode(", ", $update);

	$sql = "UPDATE $table SET $update WHERE id=$id";

	if (mysqli_query($conn, $sql)) {
		echo "<h1>Record # $id updated succesfully!</h1>";
	} else {
		echo "<h1>Record update error for: </h1>" 
		. "<p>" . $sql . "</p>" . mysqli_error($conn);
	}

	$colnames = array("lastName, firstName, email, phone");

	createTable(runQuery($colnames, $table));

} elseif ($_POST['submit'] == 'Delete') {
	/*if(isset($_GET["id2"])){*/

		$sql = "DELETE FROM $table WHERE id = $id2";

		if(mysqli_query($conn, $sql)){
			echo 'Record Deleted<br><a href="insert-form_update.html">Back</a>';
		} else {
		echo "<h1>Record update error for: </h1>" 
		. "<p>" . $sql . "</p>" . mysqli_error($conn);
	}
		$colnames = array("lastName, firstName, email, phone");
		createTable(runQuery($colnames, $table));
}

mysqli_close($conn);
echo "</body></html>";
?>