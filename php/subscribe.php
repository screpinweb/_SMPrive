<?php

	require 'MailSender.php';

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$your_email = ''; // enter your email address

		extract($_POST);

		$response = array(
			'status' => 'fail',
			'errors' => null
		);

		$subject = 'Mad subscribe form';
		$message = 'Email: ' . $email . "\r\n";

		try{

			$sender = new Mad\MailSender(array(
				'email' => $your_email,
				'headers' => array(
					'From' => 'Mad subscribe form',
					'Reply-To' => $email,
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
