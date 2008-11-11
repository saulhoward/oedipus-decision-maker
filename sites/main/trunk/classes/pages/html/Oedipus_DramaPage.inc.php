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
Oedipus_RestrictedPage
{
	private $drama;

	public function
		content()
	{
		/*
		 * Get the Drama
		 */
		if (isset($_GET['drama_unique_name'])) {
			try 
			{
				$this->drama =
					Oedipus_DramaHelper
					::get_drama_by_unique_name($_GET['drama_unique_name']);
			}
			catch (Exception $e) 
			{
				throw new Exception($e);
			}
		}
		elseif (isset($_GET['drama_id'])) {
			try
			{
				$this->drama =
					Oedipus_DramaHelper
					::get_drama_by_id($_GET['drama_id']);
			}
			catch (Exception $e)
			{
				throw new Exception($e);
			}
		}

		if (isset($this->drama)) {
			/*
			 * Find out if currently logged in user created the drama
			 * Or has permission to view the drama
			 * Or the drama is public
			 */
			$user_id = Oedipus_LogInHelper::get_current_user_id();
			// $user = Oedipus_UsersHelper::get_user($user_id);

			if (
				Oedipus_UsersHelper
				::is_user_id_drama_creator($user_id, $this->drama)
			) {
				/*
				 * Set Edit Priviliges
				 */
				$this->drama->make_drama_editable();
			}
			if (
				($this->drama->is_public())
				||
				($this->drama->is_editable())
				||
				(
					Oedipus_UsersHelper
					::is_user_id_allowed_to_view_drama(
						$user_id, $this->drama
					)
				)
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
		else {
                        /*
			 * no drama set
                         */
			DBPages_PageRenderer::render_page_section('drama', 'title');
			DBPages_PageRenderer::render_page_section('drama', 'no-drama-set');
		}

	}

	private function
		get_drama_div()
	{
                /*
		 * Oedipus_DramaDiv is the main Drama view
                 */
		return new Oedipus_DramaDiv(
			$this->drama
		);
	}

	public function 
		render_head_script_javascript() 
	{ 
		parent::render_head_script_javascript();

		echo '<script type="text/javascript" src="/scripts/Oedipus_DramaPage.js"></script>' . "\n";
	}
}
?>
