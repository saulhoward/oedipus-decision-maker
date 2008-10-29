<?php
class
	Oedipus_EditFrameRedirectScript
extends
	PublicHTML_RedirectScript
{
	private $frame_id;

	protected function
		do_actions()
	{
		$return_to_url = $this->get_return_to_url();

		/*
		 * The $_POST
		 */
		if (isset($_POST['frame_id']))
		{
			$this->frame_id = $_POST['frame_id'];

			if (isset($_POST['frame_name']))
			{
				Oedipus_FrameHelper::set_frame_name(
					$this->frame_id,
					$_POST['frame_name']
				);
			}

			elseif (
				isset($_POST['character_id'])
				&&
				isset($_POST['character_name'])
				&&
				isset($_POST['character_color'])
			)
			{
				Oedipus_FrameHelper::update_character_by_id(
					$_POST['character_id'],
					$_POST['character_name'],
					$_POST['character_color']
				);
			}

			elseif (
				isset($_POST['option_name'])
				&&
				isset($_POST['option_id'])
			)
			{
				Oedipus_FrameHelper::set_option_name(
					$_POST['option_id'],
					$_POST['option_name']
				);
			}
		}

		/*
		 * The $_GET
		 */
		elseif (isset($_GET['frame_id']))
		{
			$this->frame_id = $_GET['frame_id'];
			if (
				isset($_GET['new_character'])
			)
			{
				Oedipus_FrameHelper::add_character(
					'New character',
					$this->frame_id,
					'orange'
				);
			}
			elseif (
				isset($_GET['delete_character'])
				&&
				isset($_GET['character_id'])
			)
			{
				Oedipus_FrameHelper::delete_character(
					$_GET['character_id']
				);
			}
			elseif (
				isset($_GET['add_option'])
				&&
				isset($_GET['character_id'])
			)
			{
				Oedipus_FrameHelper::add_option(
					'New Option',
					$_GET['character_id'],
					$this->frame_id
				);
			}
			elseif (
				isset($_GET['delete_option'])
				&&
				isset($_GET['option_id'])
			)
			{
				Oedipus_FrameHelper::delete_option(
					$_GET['option_id']
				);
			}
			elseif (
				isset($_GET['edit_position'])
				&&
				isset($_GET['position_id'])
				&&
				isset($_GET['position_tile'])
				&&
				isset($_GET['position_doubt'])
			)
			{
				Oedipus_FrameHelper::update_position_by_id(
					$_GET['position_id'],
					$_GET['position_tile'],
					$_GET['position_doubt']
				);
			}
			elseif (
				isset($_GET['edit_stated_intention'])
				&&
				isset($_GET['stated_intention_id'])
				&&
				isset($_GET['stated_intention_tile'])
				&&
				isset($_GET['stated_intention_doubt'])
			)
			{
				Oedipus_FrameHelper::update_stated_intention_by_id(
					$_GET['stated_intention_id'],
					$_GET['stated_intention_tile'],
					$_GET['stated_intention_doubt']
				);
			}
		}

		$this->set_return_to_url($return_to_url);
	}
	
	protected function
		get_return_to_url()
	{
		$get_variables = array();

		if (isset($this->frame_id))
		{
			$get_variables = array("frame_id" => $this->frame_id);

		}

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditFramePage', $get_variables);
	}

}
?>
