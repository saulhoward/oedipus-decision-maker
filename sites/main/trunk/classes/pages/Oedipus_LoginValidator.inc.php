<?php
/**
 * Oedipus_LoginValidator
 *
 * @copyright 2008-04-10, Clear Line Web Design
 */

class
	Oedipus_LoginValidator
extends
	#PublicHTML_HaddockHTTPResponse
	Oedipus_RedirectScript
{
	#public function
	#	run()
	#{
	#	session_start();
	#	
	#	header("Location:" . $this->attempt_login());
	#}
	
	public function
		do_actions()
	{
		$return_to_url = $this->attempt_login();
		
		#echo (Oedipus_LogInHelper::is_logged_in() ? 'Logged in' : 'Not logged in') . "\n";
		
		#print_r($return_to_url); exit;
		
		$this->set_return_to_url($return_to_url);
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
		attempt_login()
	{
		self::unset_form_session();
		
		Oedipus_LoginPage::reset_session_form();
		
		$_SESSION['values']['email'] = $_POST['email'];
		
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		
		$dbh = $this->get_dbh();
		
		$email = mysql_real_escape_string($email, $dbh);
		
		$query = <<<SQL
SELECT
	id
FROM
	oedipus_users
WHERE
	email = '$email'
	AND
	password = '$password'
SQL;

		#echo $query; exit;
		
		$result = mysql_query($query, $dbh);
		
		if ($row = mysql_fetch_array($result)) {
			#print_r($row); exit;
			
			$user_id = $row['id'];
			
			self::unset_form_session();
			
			/*
			 * Log in.
			 */
			Oedipus_LogInHelper::log_in($user_id);
			
			#return '/Oedipus_MemberPage';
			if (
				Oedipus_LogInHelper
					::desired_restricted_page_url_is_set()
			) {
				return Oedipus_LogInHelper
					::get_desired_restricted_page_url();
			} else {
				return Oedipus_UsersHelper
					::get_users_page_url($user_id);
			}
		} else {
			#echo "No row found\n"; exit;
			$_SESSION['errors']['login']['class'] = 'error';
			$_SESSION['errors']['login']['message'] = "Unable to log in.";
				
			#return '/Oedipus_LoginPage';
			return Oedipus_LogInHelper
				::get_log_in_page_url();
		}
	}
}
?>
