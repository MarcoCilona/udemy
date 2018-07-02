<?php 
	
	// parameters of setcookie function
	$name = "name";	
	$value = "Anna";
	$expiration = time() + (20) ;

	setcookie($name, $value, $expiration);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cookies</title>
</head>
<body>

	<?php 

		if(isset($_COOKIE['name'])){

			$name = $_COOKIE['name'];



		}else{

			$name = "";

		}


		echo $name;

	?>
	
</body>
</html>