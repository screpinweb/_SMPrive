<?php

	require 'MailSender.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$your_email = ''; // enter your email address

		extract($_POST);

		$response = array(
			'status' => 'fail',
			'errors' => null
		);

		$message = '';


		if(isset($cf_name)){

			$cf_name = htmlspecialchars(filter_var($cf_name, FILTER_SANITIZE_STRING), ENT_QUOTES | ENT_HTML5);

			$message .= 'Name: ' . $cf_name . "\r\n";

		}

		if(isset($cf_email)){

			$message .= 'Email: ' . $cf_email . "\r\n";

		}

		if(isset($cf_country)){

			$country .= 'Country: ' . $cf_country . "\r\n";

		}

		if(isset($cf_message)){

			$cf_message = htmlspecialchars(filter_var($cf_message, FILTER_SANITIZE_STRING), ENT_QUOTES | ENT_HTML5);

			$message .= 'Message: ' . $cf_message . "\r\n";

		}
		if(isset($cf_phone)){
			$subject = htmlspecialchars(filter_var($cf_phone, FILTER_SANITIZE_STRING), ENT_QUOTES | ENT_HTML5);
		}
		else{
			$subject = 'Mad contactform form';
		}

		try{

			$sender = new Mad\MailSender(array(
				'email' => $your_email,
				'headers' => array(
					'From' => 'Mad contact form',
					'Reply-To' => isset($cf_email) ? $cf_email : '',
					'X-Mailer' => 'PHP'
				)
			));

			if($sender->send($message, $subject)){

				$response['status'] = 'success';
				$response['statusText'] = 'Your mail has been successfully sent!';

			}
			else{

				$response['errors'] = $sender->getErrorsList();

			}

		}
		catch(Exception $e){

			$response['errors'] = $e->getMessage();

		}

		echo json_encode($response);

	}

?>
