<html>
<head>
	<title>Exercise 2: PHP Form</title>
</head>
<body>

<form action="Ex2.php" method="POST">
	Name: <input type="text" name="name"/>
	Surname: <input type="text" name="surname"/>
	<input type="submit" name="submit"/>
</form>

<?php

if(isset($_POST['submit']))
{
	if($_POST["name"] || $_POST["surname"])
	{
		echo "Welcome " . $_POST["name"] . " " . $_POST["surname"] . "!";
	}
}

?>

</body>
</html>