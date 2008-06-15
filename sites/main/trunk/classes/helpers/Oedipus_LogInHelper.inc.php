<?php
/**
 * Oedipus_LogInHelper
 *
 * @copyright Clear Line Web Design, 2008-02-05
 */

class
	Oedipus_LogInHelper
{
	/**
	 * Should each log in be logged?
	 *
	 * We could remove the last_logged_in field and
	 * add another table, recording the start and finish
	 * of each session.
	 */
	public static function
		log_in($user_id)
	{
		/*
		 * Update the last logged in field.
		 */
		$dbh = DB::m();
		
		$user_id = mysql_real_escape_string($user_id, $dbh);
		
		$stmt = <<<SQL
UPDATE
	ps_users
SET
	last_logged_in = NOW()
WHERE
	id = $user_id
SQL;
		
		mysql_query($stmt, $dbh);
		
		/*
		 * Set the session variable.
		 */
		
		#print_r($_SESSION);
		
		$_SESSION['logged-in-id'] = $user_id;
		
		#print_r($_SESSION);
		#exit;
	}
	
	public static function
		is_logged_in()
	{
		return isset($_SESSION['logged-in-id']);
	}
	
	/**
	 * Returns the user ID of the user who is logged in for this
	 * session.
	 */
	public static function
		get_current_user_id()
	{
		if (self::is_logged_in()) {
			return $_SESSION['logged-in-id'];
		}
		
		return NULL;
	}
	
	public static function
		insist_logged_in(
			$action = 'do that'
		)
	{
		if (self::is_logged_in()) {
			return TRUE;
		} else {
			throw new Exception("You have to be logged in to $action!");
		}
	}
	
	/**
	 * DEPRECATED!
	 */
	public static function
		user_is_logged_in_and_is_able_to($action)
	{
		self::insist_logged_in($action);
	}
	
	/**
	 * @param uint $user_id The ID of the user in question.
	 * @return boolean Whether that users is the current user logged in for this session.
	 */
	public static function
		compare_user_id_to_currently_logged_in_id($user_id)
	{
		if (self::is_logged_in()) {
			return $user_id == $_SESSION['logged-in-id'];
		}
		
		return FALSE;
	}
	
	/*
	 * ----------------------------------------
	 * Functions to do with generating URLs
	 * ----------------------------------------
	 */
	
	public static function
		get_log_in_page_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url(
				'Oedipus_LoginPage'
			);
	}
	
	public static function
		get_log_in_redirect_script_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url(
				'Oedipus_LoginValidator',
				array(
					'attempt_submit' => 1
				)
			);
	}
	
	/*
	 * ----------------------------------------
	 * Functions to do with redirecting to the desired restricted page.
	 * ----------------------------------------
	 */
	
	public static function
		set_desired_restricted_page_url_to_current_location()
	{
		self
			::set_desired_restricted_page_url(
				PublicHTML_URLHelper
					::get_current_url()
				);
	}
	
	public static function
		redirect_to_log_in_page()
	{
		PublicHTML_RedirectionHelper
			::redirect_to_url(
				self
					::get_log_in_page_url()
			);
	}
	
	public static function
		set_desired_restricted_page_url(
			HTMLTags_URL $url
		)
	{
		$svm = Caching_SessionVarManager
			::get_instance();
		
		$svm->set(
			'desired_restricted_page_url',
			$url
		);
	}
	
	public static function
		get_desired_restricted_page_url()
	{
		$svm = Caching_SessionVarManager
			::get_instance();
		
		return $svm->get(
			'desired_restricted_page_url'
		);
	}
	
	public static function
		desired_restricted_page_url_is_set()
	{
		$svm = Caching_SessionVarManager
			::get_instance();
		
		return $svm->is_set(
			'desired_restricted_page_url'
		);
	}
}
?>
