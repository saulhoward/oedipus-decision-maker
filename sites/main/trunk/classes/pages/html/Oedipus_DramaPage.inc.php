<?php
/**
 * Oedipus_DramaPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 * @copyright 2008-04-27, SANH
 */

class
Oedipus_DramaPage
extends
Oedipus_RestrictedPage
//Oedipus_HTMLPage
{
	private $drama;
	private $edit_privilege;

	public function
		content()
	{
		/*
		 * Get the Drama
		 */
		if (isset($_GET['drama_unique_name']))
		{
			try
			{
				$this->drama =
					Oedipus_DramaHelper
					::get_drama_by_unique_name($_GET['drama_unique_name']);
			}
			catch (Exception $e)
			{
			}
		}
		elseif (isset($_GET['drama_id']))
		{
			try
			{
				$this->drama =
					Oedipus_DramaHelper
					::get_drama_by_id($_GET['drama_id']);
			}
			catch (Exception $e)
			{
			}
		}

		if (isset($this->drama))
		{
			/*
			 * Find out if currently logged in user created the drama
			 * Or has permission to view the dram
			 * Or the drama is public
			 */
			$user_id = Oedipus_LogInHelper::get_current_user_id();
			$this->edit_privilege = FALSE;

			//                $user = Oedipus_UsersHelper::get_user($user_id);
			if (
				Oedipus_UsersHelper
				::is_user_id_drama_creator($user_id, $this->drama)
			) 
			{
				$this->edit_privilege = TRUE;

				$drama_page_div =
					$this->get_oedipus_drama_page_div();
				echo $drama_page_div->get_as_string();
			}
			elseif (
				($this->drama->is_public())
				||
				(
					Oedipus_UsersHelper
					::is_user_id_allowed_to_view_drama(
						$user_id, $this->drama
					)
				)
			) 
			{
				$drama_page_div =
					$this->get_oedipus_drama_page_div();
				echo $drama_page_div->get_as_string();
			}
			else
			{
				// DRAMA CREATOR ID NOT SAME AS LOGGED IN USER
				DBPages_PageRenderer
					::render_page_section('drama', 'title');
				DBPages_PageRenderer
					::render_page_section('drama', 'drama-unavailable');
			}
		}
		else
		{
			// NO DRAMA SET
			DBPages_PageRenderer::render_page_section('drama', 'title');
			DBPages_PageRenderer::render_page_section('drama', 'no-drama-set');
		}

	}

	private function
		get_oedipus_drama_page_div()
	{
		$drama_page_div = new HTMLTags_Div();
		$drama_page_div->set_attribute_str('class', 'drama');

		$drama_page_options = $this->get_oedipus_drama_page_actions();
		$drama_page_div->append_tag_to_content($drama_page_options);

		if (isset($this->drama))
		{
			$drama_page_div->append_tag_to_content(
				$this->get_drama_heading()
			);

			$drama_page_div->append_tag_to_content(
				$this->get_oedipus_html_drama_div()
			);
		}

		return $drama_page_div;
	}

	private function
		get_oedipus_html_drama_div()
	{
		return Oedipus_DramaHelper::get_drama_div();
	}

	private function
		get_oedipus_drama_page_actions()
	{
		return new Oedipus_OedipusDramaPageActionsUL(
			$this->drama, $this->edit_privilege
		);
	}

	/*
	 * Functions to call in the html-tags
	 * classes for the page elements
	 *
	 */
	private function
		get_drama_heading()
	{
		$heading = new HTMLTags_Heading(2);
		//                $span = new HTMLTags_Span('Drama:&nbsp;');
		//                $span->set_attribute_str('class', 'edit-text');
		//                $heading->append_tag_to_content($span);
		$heading->append_str_to_content($this->drama->get_name());
		return $heading;
	}
}
?>
