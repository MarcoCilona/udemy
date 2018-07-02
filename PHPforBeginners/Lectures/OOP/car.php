<?php  

	class Car {				// create a class

		// setting some parameters of the class
		static $wheel = 4;	// static keyword says that is only usable by the class, is attached to the class not to the object. Syntax is: Car::$wheel
		var $hood = 1;
		var $engine = 1;
		var $doors = 4;
		var $owner = "";

		function __construct ($owner = "None") {

			$this->owner = $owner;

		}


		function MoveWheels(){			// create a class method

			Car::$wheel = 5;

		}

	}

	// inheritance properties and methods form another class, in this case from Car class
	// extends is the keyword to make inheritance
	class Plane extends Car{


	}


?>