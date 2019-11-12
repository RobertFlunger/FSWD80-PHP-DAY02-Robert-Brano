<html>
<head>
	<title>Exercise 3: Division calculation</title>
</head>
<body>

<form action="Ex3.php" method="POST">
	Insert first number: <input type="text" name="par1"/>
	Insert second number: <input type="text" name="par2"/>
	<input type="submit" name="submit"/>
</form>



<?php

function divide($par1, $par2) {
	$par1 = $par1*1;
	$par2 = $par2*1;
	
	if (is_integer($par1) && is_integer($par2)) {
		$out = $par1 / $par2;
		echo "$out";
	} else {
		echo "Please insert integer numbers!";
		unset($_POST["par1"], $_POST["par2"]);
	}
}

if(isset($_POST['submit']))
{
	if($_POST["par1"] || $_POST["par2"])
	{
		divide($_POST["par1"], $_POST["par2"]);
	}
}



?>

</body>
</html>