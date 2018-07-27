<?php 
	
	/**
	 * This function will get the infromations to be sent by email. 
	 */
	if(isset($_POST['submit_contact'])){

		// getting informations
		$subject = wordwrap(mysqli_real_escape_string($connection, $_POST['contact_subject']), 70);
		$header = "From: " . $_POST['contact_email'];
		$content = mysqli_real_escape_string($connection, $_POST['contact_content']);

		// setting reciever informations
		$email_to = "";		
		$contact_msg = "Email sent!";
		/**
		 * Calling out the mail php function.
		 */
		if(!mail($email_to, $subject, $content, $header))
			$contact_msg = "Email has not been sent!";

	}

?>