<?php

	// define variables and set to empty
	$first_name = $last_name = $phone_number = $email = $course[] = $theCourse = $education_background = $motivation = $computer_experience = $programming_experience = "";
	$err = false; // is form input valid?


	// if server recieved a POST request, get form input
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if (empty($_POST["first-name"])) {
			$err = true;
		} else {
			$first_name = test_input($_POST['first-name']);
			if (!preg_match("/^[a-zA-Z0-9.\- ]+$/", $first_name)) {
			  $err = true; 
			}
		}
		if (empty($_POST["last-name"])) {
			$err = true;
		} else {
			$last_name = test_input($_POST['last-name']);
			if (!preg_match("/^[a-zA-Z0-9.\- ]+$/", $last_name)) {
			  $err = true; 
			}
		}
		if (empty($_POST["phone-number"])) {
			$err = true;
		} else {
			$phone_number = test_input($_POST['phone-number']);
			if (!preg_match("/^[a-zA-Z0-9\-\.\(\) ]*$/", $phone_number)) {
			  $err = true; 
			}
		}
		if (empty($_POST["email"])) {
			$err = true;
		} else {
			$email = test_input($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $err = true;
			}
		}
		if (empty($_POST["course"])) {
			$err = true;
		} else {
			foreach($_POST["course"] as $selected) {
				//concatenate checked boxes to a string variable for output
				$theCourse .= $selected . ", " ;
			}
		}
		if (empty($_POST["education-background"])) {
			$err = true;
		} else {
			$education_background = test_input($_POST['education-background']);
		}
		if (empty($_POST["motivation"])) {
			$err = true;
		} else {
			$motivation = test_input($_POST['motivation']);
		}
		if (empty($_POST["computer-experience"])) {
			$err = true;
		} else {
			$computer_experience = test_input($_POST['computer-experience']);
		}
		// last step in form is not required
		$programming_experience = test_input($_POST['programming-experience']);

	}

	// if an error exists, do not send the form,
	// redirect to the failure.html page
	if ($err === true) {
		echo "form not valid!";
		header('Location: ../failure.html');
  
	} else {
		// Create the response and send email
		$to = 'info@codeabode.com';
		// $to = 'retwedt@gmail.com';
		$email_subject = "CodeAbode Application: " . $first_name . " " . $last_name;
		$email_body = "Name: " . $first_name . " " . $last_name . "\nEmail: " . $email . "\nPhone: " . $phone_number . "\nWhich session are you interested in: " . $theCourse . "\nWhat is your education background? " . $education_background . "\nWhy do you want to learn to code? " . $motivation .	"\nWhat is your experience with computers? " . $computer_experience . "\nWhat is your experience with programming? " . $programming_experience;
		$headers = "From: noreply@codeAbode.com\n";
		$headers .= "Reply-To: $email";
		$result = mail($to, $email_subject, $email_body, $headers);


		//if mail was successfully sent, redirect to thankYou page
		if($result == 1) {
		   echo "Success!";
			 header('Location: ../success.html');
		   // return 1;
		} else {
		   echo "Unable to Submit Form";
			 header('Location: ../failure.html');
		   // return 0;
		}

	}


	//function to validate form input
	function test_input($input) {
	  $input = trim($input);
	  $input = stripslashes($input);
	  $input = htmlspecialchars($input);
	  return $input;
	}

?>