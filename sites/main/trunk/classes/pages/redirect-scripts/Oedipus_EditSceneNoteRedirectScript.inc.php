<?php
class
	Oedipus_EditSceneNoteRedirectScript
extends
	Oedipus_RedirectScript
{
	private $get_variables;

	protected function
		do_actions()
	{
		$this->set_return_message('edited note');
		$this->get_variables = array();

		/*
		 * The $_POST
		 */
		if (
			isset($_POST['edit_note'])
			&&
			isset($_POST['note_id'])
			&&
			isset($_POST['note_text'])
		)
		{
			Oedipus_NotesHelper::set_note_text(
				$_POST['note_id'],
				$_POST['note_text']
			);
		}
		elseif (
			isset($_POST['add_note'])
			&&
			isset($_POST['scene_id'])
		)
		{
			$scene = Oedipus_DramaHelper::get_scene_by_id($_POST['scene_id']);

			if (isset($_POST['note_text']))
			{
				Oedipus_NotesHelper::add_note_to_scene(
					$scene,
					$_POST['note_text']
				);
			}
		}

		/*
		 * The $_GET
		 */
		if (isset($_POST['drama_id']))
		{
			$this->get_variables['drama_id'] = $_POST['drama_id'];
		}
		if (isset($_POST['scene_id']))
		{
			$this->get_variables['scene_id'] = $_POST['scene_id'];
		}

		$return_to_url = $this->get_return_to_url();
		$this->set_return_to_url($return_to_url);
	}
	
	protected function
		get_return_to_url()
	{
		$url = PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaPage', $this->get_variables);
                /*
		 *Set the Return Message in the Get
                 */
		$url->set_get_variable('return_message', $this->get_return_message());
		return $url;
	}
}
?>
