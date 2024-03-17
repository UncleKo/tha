<?php

	if (isset($_POST['name'])) {
	
		$name = strip_tags($_POST['name']);
		$email= strip_tags($_POST['email']);		
		$subject = strip_tags($_POST['subject']);
		$comments = strip_tags($_POST['comments']);
		
		$message="You've got an inquiry\n\n";
		$message.= "Name: ".$name."\n";
		$message.="Email: ".$email."\n";
		$message.="Comments: ".$comments;
		
		if (validate_email($email) && !empty($name) && !empty($subject) && !empty($comments) ) {
		
			if (mail('info@ktee8.com', $subject, $message, "From: $email")) {
				echo "<h2>Your email has been sent. Thank you so much. We'll get back to you as soon as possible.</h2>";
			} else {
				echo "<h2>Problem occured while sending email</h2>";
			}
		
		} else {
		
			echo "<h2>Please fill out all fields and ensure that your email address is valid.</h2>";

		}
	
	} else {
		echo "<h2>Please fill out all fields and ensure that your email address is valid.</h2>";
	}
	
	function validate_email($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	
?>