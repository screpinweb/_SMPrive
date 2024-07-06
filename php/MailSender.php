<?php

	/**
	 * MailSender.php
	 *
	 **/

	namespace Mad;

	class MailSender{

		protected $email;
		protected $headers;

		protected $errors = array();

		/**
		 * Constructor. Initialize properties
		 * @param Array $options - array of settings
		 * @return void;
		 **/
		public function __construct(Array $options){

			if(isset($options['email'])) $this->email = $options['email'];
			else throw new \InvalidArgumentException("Email address should be specified.");

			if(isset($options['headers']) && is_array($options['headers'])) $this->headers = $options['headers'];

		}

		/**
		 * Sends mail
		 * @param string $message
		 * @return boolean;
		 **/
		public function send($message = '', $subject = ''){

			if(!is_array($this->email) && !$this->validateEmail($this->email)){

				$this->addError('Email address "' . $this->email . '" is invalid.');
				return false;

			}
			elseif(is_array($this->email)){

				$valid_emails = true;

				foreach($this->email as $email){

					if(!$this->validateEmail($email)){

						$this->addError('Email address "' . $email . '" is invalid.');
						$valid_emails = false;

					}

				}

				if(!$valid_emails) return false;

			}

			$email = is_array($this->email) ? implode(', ', $this->email) : $this->email;
			$headers = $this->makeHeaders();
			$message = filter_var($message, FILTER_SANITIZE_STRING);
			$subject = filter_var($subject, FILTER_SANITIZE_STRING);

			if(!mail($email, $subject, $message, $headers)){

				$this->addError('Could not send a mail, sorry. Please try again.');
				return false;

			}

			return true;

		}

		/**
		 * Creates the mail headers
		 * @return string;
		 **/
		protected function makeHeaders(){

			$headers = array();

			if(!isset($this->headers)) return null;

			foreach ($this->headers as $name => $value) {

				$headers[] = $name . ': ' . filter_var($value, FILTER_SANITIZE_STRING);

			}

			return $headers ? implode("\r\n", $headers) : null;

		}

		/**
		 * Checks the correct email address
		 * @param string $email
		 * @return boolean;
		 **/
		protected function validateEmail($email){

			return filter_var($email, FILTER_VALIDATE_EMAIL);

		}

		/**
		 * Adds new error
		 * @param string $message
		 * @return void;
		 **/
		protected function addError($message){

			$this->errors[] = $message;

		}

		/**
		 * Returns list of errors
		 * @return string;
		 **/
		public function getErrorsList(){

			return implode("\r\n", $this->errors);

		}

	}

?>
