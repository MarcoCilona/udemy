<?php 

	$file = "example.txt";
	
	$handle = fopen($file, 'w');

	if($handle){

		fwrite($handle, "Anna è bellissima!");

	}


	$read = fopen($file, 'r');

	echo fread($read, filesize($file));

	fclose($handle);

?>