<?php
/**
 * Oedipus_RestrictedPage
 *
 * @copyright 2008-04-11, Clear Line Web Design
 */

/**
 * A class that extends this abstract class represents a
 * page that can only be accessed by users who are logged in.
 *
 * If the user is not logged in, they are taken to the log in page.
 * After they have successfully logged in, they are taken back to
 * the restricted page that they first requested.
 */
abstract class
	Oedipus_RestrictedPage
extends
	Oedipus_HTMLPageWithAccountStatus
{
	public function
		send_http_headers()
	{
		#session_start();
		parent::send_http_headers();
		
		#print_r($_SESSION); exit;
		
		if (
			Oedipus_LogInHelper::is_logged_in()
		) {
			// $this # What is this here for? changed it to LogInHelper
			//

			Oedipus_LogInHelper::
				log_in(
					Oedipus_LogInHelper
						::get_current_user_id()
				);
		} else {
			Oedipus_LogInHelper
				::set_desired_restricted_page_url_to_current_location();
			
			Oedipus_LogInHelper
				::redirect_to_log_in_page();
		}
		
		#print_r($this); exit;
		
		#if (!(isset($this->first_name) && isset($this->last_name))) {
		#	header('Location: /Play4ATeam_LoginPage');
		#	exit;
		#}
	}
}
?>
