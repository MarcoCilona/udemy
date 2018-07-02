<?php include('car.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>OOP</title>
</head>
<body>
	
	<?php 

		$opel = new Car('Maria Rosa');

		$opel->MoveWheels();

		echo "Opel has: " . Car::$wheel . " wheels and its owner is: " . $opel->owner . " <br>";

		echo "Trying the inheritance <br>";

		$fiestino = new Plane();

		echo "Fiestino has: " . Car::$wheel. " wheels and its owner is: " . $fiestino->owner;
	?>

</body>
</html>