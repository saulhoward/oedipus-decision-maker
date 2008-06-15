<?php
/**
 * Oedipus_UserPage
 *
 * @copyright Clear Line Web Design, 2008-01-09
 */

/**
 * The page that gives the user's profile.
 */
class
	Oedipus_UserPage
extends
	Oedipus_RestrictedPage
{
	#public function
	#	send_session_headers()
	#{
	#	parent::send_session_headers();
	#	
	#	if ($_GET['
	#}
	
	public function
		render_head_link_stylesheet()
	{
		parent::render_head_link_stylesheet();
		
		HTMLTags_LinkRenderer
			::render_style_sheet_link(
				'/styles/classified-ads.css'
			);
	}
	
	public function
		content()
	{
		if (
			isset($_GET['user_id'])
		) {
			$user_id = $_GET['user_id'];
		} else {
			$user_id = Oedipus_LogInHelper::get_current_user_id();
		}
		
		$user = Oedipus_UsersHelper::get_user($user_id);
		
		if (
			Oedipus_LogInHelper
				::compare_user_id_to_currently_logged_in_id($user_id)
		) {
			echo '<h2>Your Account</h2>';
			
			$other_teams_heading = 'Your teams';
			
			echo '<p>Welcome to <em>Oedipus: Decision Maker</em>, ';
			
			echo stripcslashes($user['first_name'] . ' ' . $user['last_name']);
			
			echo "!</p>\n";
		} else {
			echo '<h2>' . stripcslashes($user['first_name'] . ' ' . $user['last_name']) . "'s Page</h2>\n";
			
			$other_teams_heading = 'Teams';
		}
		
		DBPages_PageRenderer::render_page_section('users', 'welcome');
		
		/*
		 * Show the teams that this user already a user of.
		 */
		
		#$team_root_url = $this->get_current_url_just_file();
		#
		#$team_root_url->set_get_variable('oo-page');
		#$team_root_url->set_get_variable('page-class', 'Oedipus_TeamPage');
		
	}
	
	protected function
		get_navigation_pages()
	{
		$navigation_pages = parent::get_navigation_pages();

//                $navigation_pages[] = array(
//                        'page-class' => 'Oedipus_FindATeamPage',
//                        'href' => '/Oedipus_FindATeamPage',
//                        'title' => 'Find a Team',
//                        'text' => 'Find a Team'
//                );
		
		$navigation_pages[] = array(
			'page-class' => 'Oedipus_AddATeamPage',
			'href' => '/Oedipus_AddATeamPage',
			'title' => 'Add a Team',
			'text' => 'Add a Team'
		);
		
		return $navigation_pages;
	}
}
?>
