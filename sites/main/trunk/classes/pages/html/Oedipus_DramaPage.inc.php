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
				throw new Exception($e);
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
				throw new Exception($e);
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

			// $user = Oedipus_UsersHelper::get_user($user_id);
			if (
				Oedipus_UsersHelper
				::is_user_id_drama_creator($user_id, $this->drama)
			) 
			{
				$this->drama->make_drama_editable();
			}
			if (
				($this->drama->is_public())
				||
				(
					Oedipus_UsersHelper
					::is_user_id_drama_creator($user_id, $this->drama)
				)
				||
				(
					Oedipus_UsersHelper
					::is_user_id_allowed_to_view_drama(
						$user_id, $this->drama
					)
				)
			) 
			{
                                /*
				 * Echo the Drama 
                                 */
				$drama_page_div =
					$this->get_drama_page_div();
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
		get_drama_page_div()
	{
		if (isset($_GET['view_frame_id']))
		{
			return $this->get_frame_view_drama_div();
		}

		return $this->get_tree_view_drama_div();
	}

	private function
		get_frame_view_drama_div()
	{
		return new Oedipus_FrameViewDramaDiv(
			$this->drama, $_GET['view_frame_id']
		);
	}

	private function
		get_tree_view_drama_div()
	{
		return new Oedipus_TreeViewDramaDiv(
			$this->drama
		);
	}

}
?>
