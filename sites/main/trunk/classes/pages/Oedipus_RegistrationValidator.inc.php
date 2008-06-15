<?php
/**
 * Oedipus_RegistrationValidator
 *
 * @copyright Clear Line Web Design, 2008-02-18
 */

class
	Oedipus_RegistrationValidator
extends
	PublicHTML_HTTPResponseWithMessageBody
{
	public function
		run()
	{
		session_start();
		
		#echo __METHOD__ . "\n"; print_r($_POST); exit;
		
		// read validation type (PHP or AJAX?)
		if (isset($_GET['attempt_submit'])) {
			header("Location:" . $this->attempt_submit());
		} else {
			$this->render();
		}
	}
	
	public function
		render()
	{
		#print_r($_POST);
		#exit;
		
		// AJAX validation is performed by the ValidateAJAX method. The results
		// are used to form an XML document that is sent back to the client
		$field_response = $this->validate_field(
			$_POST['input_value'],
			$_POST['field_id']
		);
		
		#echo "\$field_response: $field_response\n";
		#exit;
		
		$field_id = $_POST['field_id'];

		#echo "\$field_id: $field_id\n";
		#exit;
		
		$response = <<<XML
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<response>
	<result>$field_response</result>
	<field_id>$field_id</field_id>
</response>
XML;
		
		header('Content-Type: text/xml');
		
		echo $response;
	}
	
	// supports AJAX validation, verifies a single value
	protected function
		validate_field($input_value, $field_id)
	{
		#echo "Got to validate_ajax\n";
		#exit;
		
		// check which field is being validated and perform validation
		switch($field_id) {
			case 'email':
				return $this->validate_email($input_value);
				break;
			case 'first_name':
				return $this->validate_first_name($input_value);
				break;
			case 'last_name':
				return $this->validate_last_name($input_value);
				break;
			case 'password':
				return $this->validate_password($input_value);
				break;
			case 'password_confirmation':
				return $this->validate_password_confirmation($input_value);
				break;
			case 'check_read_terms':
				return $this->validate_check_read_terms($input_value);
				break;
			case 'check_age':
				return $this->validate_check_age($input_value);
				break;
			case 'check_newsletter':
				return $this->validate_check_newsletter($input_value);
				break;
		}
	}
	
	public static function
		unset_form_session()
	{
		if (isset($_SESSION['values'])) {
			unset($_SESSION['values']);
		}
		
		if (isset($_SESSION['errors'])) {
			unset($_SESSION['errors']);
		}		
	}
  
	// validates all form fields on form submit
	public function
		attempt_submit()
	{
		// error flag, becomes 1 when errors are found.
		$errors_exist = FALSE;
		
		self::unset_form_session();
		
		Oedipus_RegisterPage::reset_session_form();
		
		$fields = Oedipus_RegisterPage::get_fields();
		
		foreach ($fields as $field) {
			$_SESSION['values'][$field] = $_POST[$field];
			
			$response = $this->validate_field($_POST[$field], $field);
			
			if ($response != 'Success') {
				$_SESSION['errors'][$field]['class'] = 'error';
				$_SESSION['errors'][$field]['message'] = $response;
				$errors_exist = TRUE;
			}
		}
		
		// If no errors are found, point to a successful validation page
		if ($errors_exist) {
			return '/Oedipus_RegisterPage';
		} else {
			
			$dbh = self::get_dbh();
			
			$stmt = 'INSERT INTO oedipus_users SET ';
			$first = TRUE;
			foreach (explode(' ', 'first_name last_name email') as $field) {
				if ($first) {
					$first = FALSE;
				} else {
					$stmt .= ' , ';
				}
				
				$stmt .= $field . ' = ';
				$stmt .= '\'' . mysql_real_escape_string($_POST[$field], $dbh) . '\'';
			}
			
			$stmt .= ' , password = \'' . md5($_POST['password']) . '\'';
			
			$stmt .= ' , joined = NOW()';
			$stmt .= ' , last_logged_in = NOW()';
			
			mysql_query($stmt, $dbh);
			
			$user_id = mysql_insert_id($dbh);
			
			/*
			 * Have they signed up for the newsletter?
			 */
			#print_r($_POST);
			#exit;
			
			if (
				isset($_POST['check_newsletter'])
				&&
				($_POST['check_newsletter'] == 'on')
			) {
				try {
					MailingList_PeopleHelper::add_person(
						$_POST['first_name'] . ' ' . $_POST['last_name'],
						$_POST['email'],
						$force_email = TRUE
					);
				} catch (Exception $e) {
					/*
					 * Let it pass for now.
					 *
					 * Refactor email validation for this code and the mailing
					 * list plug-in to use validation in the email address plug-in.
					 */
				}
			}
			
			self::unset_form_session();
			
			/*
			 * Send a confirmation email.
			 */
			$email_to = $_POST['first_name'] . ' ' . $_POST['last_name'] . ' <' . $_POST['email'] . '>';
			$email_subject = "Welcome to play4ateam!";
			$email_body = <<<EMAIL
Welcome to Oedipus!

The sports-community website. Designed by players for players!

To get started, go to your profile page at

https://www.play4ateam.com/users/$user_id

Thanks,

The play4ateam Accounts Team

Please do not reply to this email.

EMAIL;
			
			$email_body = wordwrap($email_body, 70);
			
			$email_additional_headers = '';
			$email_additional_headers .= "From: The play4ateam Accounts Team <accounts@play4ateam.com>\r\n";
			$email_additional_headers .= "Reply-To: The play4ateam Accounts Team <accounts@play4ateam.com>\r\n";
			
			mail($email_to, $email_subject, $email_body, $email_additional_headers);
			
			/*
			 * Log in.
			 */
			$_SESSION['logged-in-id'] = $user_id;
			
			return '/haddock/public-html/public-html/index.php?oo-page=1&page-class=Oedipus_UserPage';
		}
	}

	// validate email (must be empty, and must not be already registered)
	private function
		validate_email($value)
	{
		#echo "Made it to validate email.\n";
		#exit;
		
		/*
		 * Trim.
		 */
		$value = trim($value);
		
		if (strlen($value) == 0) {
			#echo 'strlen($value): ' . strlen($value) . "\n";
			
			return 'Please set your email.';
		}
		
		/*
		 * Check that the value is a valid email.
		 */ 
		if (!preg_match('/^[a-z0-9._-]+(?:\+.*)?@[a-z0-9-]+(?:\.[a-z0-9-]+)*\.[a-z]{2,6}$/i', $value)) {
			return 'Please enter a valid email.';
		}
		
		/*
		 * Escape input value
		 */
		$dbh = self::get_dbh();
		
		$value = mysql_real_escape_string($value, $dbh);
		
		// check if the username exists in the database
		$query = <<<SQL
SELECT
	email
FROM
	oedipus_users
WHERE
	email = "$value"
SQL;

		$result = mysql_query($query, $dbh);
		
		if ($row = mysql_fetch_array($result)) {
			return 'Email address already in use.';
		}
		
		return 'Success'; 
	}
	
	private function
		validate_name($value, $adjective)
	{
		if (strlen($value) > 0) {
			return 'Success';
		} else {
			return "Please enter your $adjective name.";
		}
	}
  
	private function
		validate_first_name($value)
	{
		return $this->validate_name($value, 'first');
	}
  
	private function
		validate_last_name($value)
	{
		return $this->validate_name($value, 'last');
	}
	
	private function
		validate_password($value)
	{
		if (strlen($value) < 6) {
			return 'Your password must be at least 6 characters long.';
		}
		
		if (strlen($value) > 16) {
			return 'Your password must be at most 16 characters long.';
		}
		
		if (!preg_match('/^[a-z0-9]+/i', $value)) {
			return 'Your password must contain only letters and numbers';
		}
		
		$_SESSION['password'] = $value;
		
		return 'Success';
	}
	
	private function
		validate_password_confirmation($value)
	{
		if (!isset($_SESSION['password'])) {
			return 'Please set the password in the box above first.';
		}
		
		if ($value != $_SESSION['password']) {
			return 'Please make sure that your passwords match.';
		}
		
		return 'Success';
	}
	
	// check the user has read the terms of use
	private function validate_check_read_terms($value)
	{
		return ($value == 'true' || $value == 'on')
			? 'Success'
			: 'Please make sure that you have read the Terms of Use and the Privacy Policy.';
	}
	
	private function validate_check_age($value)
	{
		return ($value == 'true' || $value == 'on')
			? 'Success'
			: 'Please confirm that you are 16 years old or older.';
	}
	
	private function
		validate_check_newsletter($value)
	{
		return 'Success';
	}
	
	public function
		get_dbh()
	{
		$mysql_user_factory = Database_MySQLUserFactory::get_instance();
	    $mysql_user = $mysql_user_factory->get_for_this_project();
		$database = $mysql_user->get_database();
		
		$dbh = $database->get_database_handle();
		
		return $dbh;
	}
}
?>
