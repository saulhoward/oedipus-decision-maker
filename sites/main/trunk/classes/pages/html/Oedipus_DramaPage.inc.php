<?php
/**
 * Oedipus_DramaPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 * @copyright 2008-04-27, SANH
 */

/*
 * Main Drama Page: gets the drama,
 * checks for edit priviliges and
 * renders an Oedipus_DramaDiv
 */
class
Oedipus_DramaPage
extends
Oedipus_HTMLPageWithAccountStatus
//Oedipus_RestrictedPage
{
	private $drama;

	public function
		send_http_headers()
	{
		/**
		 * Copied this from Oedipus_RestrictedPage
		 *
		 * But now it only logs you in again (or redirects)
		 * if the drama is private or you're already
		 * logged in
		 */
		parent::send_http_headers();

		if (
			$this->get_drama()->is_private()
			||
			Oedipus_LogInHelper::is_logged_in()
		) {
			if (
				Oedipus_LogInHelper::is_logged_in()
			) {
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

		}
	}

	protected function
		get_drama()
	{
		if (isset($this->drama)) {
			return $this->drama;
		}
		elseif (
			(isset($_GET['drama_unique_name']))
			||
		       	(isset($_GET['drama_id']))
		) {
			$this->set_drama_from_get();
			return $this->get_drama();
		}
		else {
			throw new Oedipus_DramaPageException('No specific drama requested.');
		}
	}

	protected function
		set_drama_from_get()
	{
		/*
		 * Get the Drama
		 */
		if (isset($_GET['drama_unique_name'])) {
			$this->set_drama(
				Oedipus_DramaHelper
				::get_drama_by_unique_name($_GET['drama_unique_name'])
			);
		}
		elseif (isset($_GET['drama_id'])) {
			$this->set_drama(
				Oedipus_DramaHelper
				::get_drama_by_id($_GET['drama_id'])
			);
		}
	}

	protected function
		set_drama(Oedipus_Drama $drama)
	{
		$this->drama = $drama;
	}

	public function 
		render_head_script_javascript() 
	{ 
		parent::render_head_script_javascript();
		echo '<script type="text/javascript" src="/scripts/Oedipus_DramaPage.js"></script>' . "\n";
	}

	public function
		get_head_title()
	{
		return $this->get_drama()->get_name() 
			. ' - ' 
			. $this->get_project_title();
	}
	
	public function
		render_body_tag_open()
	{
		echo '<body id="DramaPage">' . "\n";
	}

	protected function
		get_body_div_header_heading_content()
	{
		$home_link = new HTMLTags_A(
			$this->get_body_div_header_link_content()
		);
		
		$home_link->set_href(
			Oedipus_DramaHelper
			::get_drama_page_url_for_drama_id(
				$this->get_drama()->get_id()
			)
		);
		
		return $home_link->get_as_string();
	}

	protected function
		get_body_div_header_link_content()
	{
		return $this->get_drama()->get_name();
	}
	
	public function
		render_body_div_navigation()
	{
                /*
		 *No normal Navigation Div on this page
                 */
	}

	public function
		content()
	{
		/*
		 * Find out if currently logged in user created the drama
		 * Or has permission to view the drama
		 * Or the drama is public
		 */
		if (
			Oedipus_LogInHelper::is_logged_in()
		) {
			$user_id = Oedipus_LogInHelper::get_current_user_id();
			// $user = Oedipus_UsersHelper::get_user($user_id);

			if (
				Oedipus_UsersHelper
				::is_user_id_drama_creator(
					$user_id,
					$this->get_drama()
				)
			) {
				/*
				 * Set Edit Priviliges
				 */
				$this->get_drama()->make_drama_editable();
			}
			if (
				($this->get_drama()->is_public())
				||
				($this->get_drama()->is_editable())
				||
				(
					Oedipus_UsersHelper
					::is_user_id_allowed_to_view_drama(
						$user_id, $this->get_drama()
					)
				)
			) {
				/*
				 * Render the Drama Div
				 */
				$drama_div = $this->get_drama_div();
				echo $drama_div->get_as_string();
			}
		}
		elseif (
				$this->get_drama()->is_public()
			) {
				/*
				 * Render the Drama Div
				 */
				$drama_div = $this->get_drama_div();
				echo $drama_div->get_as_string();
			}

		else {
			/*
			 *Drama creator id not same as logged in user
			 */
			DBPages_PageRenderer
				::render_page_section('drama', 'title');
			DBPages_PageRenderer
				::render_page_section('drama', 'drama-unavailable');
		}
	}

	protected function
		get_drama_div()
	{
                /*
		 * Oedipus_DramaDiv is the main Drama view
                 */
		return new Oedipus_DramaDiv(
			$this->get_drama()
		);
	}
}
?>
