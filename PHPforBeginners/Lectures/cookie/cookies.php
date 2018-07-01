<?php 
	
	// parameters of setcookie function
	$name = "Name";	
	$value = "Anna";
	$expiration = time() + (20) ;

	setcookie($name, $value, $expiration);

	print_r($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cookies</title>
</head>
<body>
	
</body>
</html>