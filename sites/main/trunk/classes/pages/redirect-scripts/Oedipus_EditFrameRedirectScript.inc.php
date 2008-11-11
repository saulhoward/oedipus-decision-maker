<?php
class
	Oedipus_EditFrameRedirectScript
extends
	Oedipus_RedirectScript
{
	private $frame_id;

	protected function
		do_actions()
	{
		$this->set_return_message('Edited Frame');

		$return_to_url = $this->get_return_to_url();
		/*
		 * The $_POST
		 */
		if (isset($_POST['frame_id']))
		{
			$this->frame_id = $_POST['frame_id'];

			if (isset($_POST['frame_name'])) {
				Oedipus_FrameHelper::set_frame_name(
					$this->frame_id,
					$_POST['frame_name']
				);
				$this->set_return_message('saved frame name');
			}

			elseif (
				isset($_POST['character_id'])
				&&
				isset($_POST['character_name'])
				&&
				isset($_POST['character_color'])
			) {
				Oedipus_FrameHelper::update_character_by_id(
					$_POST['character_id'],
					$_POST['character_name'],
					$_POST['character_color']
				);
				$this->set_return_message('edited character');
			}

			elseif (
				isset($_POST['option_name'])
				&&
				isset($_POST['option_id'])
			) {
				Oedipus_FrameHelper::set_option_name(
					$_POST['option_id'],
					$_POST['option_name']
				);
				$this->set_return_message('edited option');
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
			) {
				Oedipus_FrameHelper::add_character(
					'New character',
					$this->frame_id,
					'orange'
				);
				$this->set_return_message('added character');
			}
			elseif (
				isset($_GET['delete_character'])
				&&
				isset($_GET['character_id'])
			) {
				try
				{
					Oedipus_FrameHelper::delete_character(
						$_GET['character_id']
					);
					$this->set_return_message('deleted character');
				}
				catch (Oedipus_AttemptToDeleteLastCharacterInFrameException $e)
				{
					$this->set_return_message($e->getMessage());
				}
			}
			elseif (
				isset($_GET['add_option'])
				&&
				isset($_GET['character_id'])
			) {
				Oedipus_FrameHelper::add_option(
					'New Option',
					$_GET['character_id'],
					$this->frame_id
				);
				$this->set_return_message('added option');
			}
			elseif (
				isset($_GET['delete_option'])
				&&
				isset($_GET['option_id'])
			) {
				Oedipus_FrameHelper::delete_option(
					$_GET['option_id']
				);
				$this->set_return_message('deleted option');
			}
			elseif (
				isset($_GET['edit_position'])
				&&
				isset($_GET['position_id'])
				&&
				isset($_GET['position_tile'])
				&&
				isset($_GET['position_doubt'])
			) {
				Oedipus_FrameHelper::update_position_by_id(
					$_GET['position_id'],
					$_GET['position_tile'],
					$_GET['position_doubt']
				);
				$this->set_return_message('edited position');
			}
			elseif (
				isset($_GET['edit_stated_intention'])
				&&
				isset($_GET['stated_intention_id'])
				&&
				isset($_GET['stated_intention_tile'])
				&&
				isset($_GET['stated_intention_doubt'])
			) {
				Oedipus_FrameHelper::update_stated_intention_by_id(
					$_GET['stated_intention_id'],
					$_GET['stated_intention_tile'],
					$_GET['stated_intention_doubt']
				);
				$this->set_return_message('edited stated intention');
			}
		}

		$this->set_return_to_url($return_to_url);
	}
	
	protected function
		get_return_to_url()
	{
		/*
		 *Edit Frame page?
		 */
		if (
			(isset($_POST['return_to_get']))
			||
			(isset($_GET['return_to_get']))
		) {
			if (
				($_POST['return_to_get'] == 'edit_frame')
				||
				($_GET['return_to_get'] == 'edit_frame')
			) {
				$url =  Oedipus_DramaHelper::
					get_edit_frame_drama_page_url_for_frame_id($this->frame_id);
			}
		}
		else {
                        /*
			 *Normal Frame Page
                         */
			$url = Oedipus_DramaHelper::
				get_drama_page_url_for_frame_id($this->frame_id);
		}

                /*
		 *Set the Return Message in the Get
                 */
		$url->set_get_variable('return_message', $this->get_return_message());

		return $url;
	}
}
?>
