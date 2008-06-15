<?php
/**
 * Oedipus_UsersHelper
 *
 * @copyright Clear Line Web Design, 2008-02-19
 * @copyright SANH, 2008-10-12
 */

class
	Oedipus_UsersHelper
{
	/**
	 * Fetches the data for a user.
	 *
	 * Does not get the password (even though it's encrypted).
	 */
	public static function
		get_user($user_id)
	{
		$user = NULL;
		
		if (InputValidation_NumberValidator::validate_database_id($user_id)) {
			$dbh = DB::m();
			
			$user_id = mysql_real_escape_string($user_id, $dbh);
			
			$query = <<<SQL
SELECT
	first_name,
	last_name,
	email,
	joined,
	last_logged_in
FROM
	oedipus_users
WHERE
	id = $user_id
SQL;
			
			$result = mysql_query($query, $dbh);
			
			if ($row = mysql_fetch_assoc($result)) {
				$user = $row;
			}
		}
		
		return $user;
	}
	
	public static function
		get_link_to_users_page_a_as_string($user_id)
	{
		$str = '';

		$str .= '<a href="';

		$url = Play4ATeam_MemberHelper::get_user_page_url($user_id);

		$str .= $url->get_as_string();

		$str .= '">';
		
		$user = Play4ATeam_MemberHelper::get_user($user_id);

		$str .= $user['first_name'] . ' ' . $user['last_name'];

		$str .= '</a>';
		
		return $str;
	}
	
	public function
		is_user_id_drama_creator($user_id, Oedipus_Drama $drama)
	{
		$user = NULL;
		$drama_id = $drama->get_id();

		if (InputValidation_NumberValidator::validate_database_id($user_id)) {
			$dbh = DB::m();

			$user_id = mysql_real_escape_string($user_id, $dbh);

			$query = <<<SQL
SELECT
	count(created_by_user_id) AS count
FROM
	oedipus_dramas
WHERE
	oedipus_dramas.created_by_user_id = $user_id
	AND
	oedipus_dramas.id = $drama_id
SQL;

			$result = mysql_query($query, $dbh);

			if ($row = mysql_fetch_assoc($result)) {

				if ($row['count'] == 1)
				{
					return TRUE;
				}
				return FALSE;
			}
		}
	}

	/*
	 * ----------------------------------------
	 * Functions to do with URLs
	 * ----------------------------------------
	 */
	
	public static function
		get_users_page_url($user_id)
	{
		return PublicHTML_URLHelper
			::get_oo_page_url(
				'Oedipus_UserPage',
				array(
					'user_id' => $user_id
				)
			);
		
//                $url = new HTMLTags_URL();
//                
//                $url->set_file("/users/$user_id");
		
		return $url;
	}
}
?>
