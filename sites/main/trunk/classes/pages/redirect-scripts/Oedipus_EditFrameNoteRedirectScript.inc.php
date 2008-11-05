<?php
class
	Oedipus_EditFrameNoteRedirectScript
extends
	PublicHTML_RedirectScript
{
	private $get_variables;

	protected function
		do_actions()
	{
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
			isset($_POST['frame_id'])
		)
		{
			$frame = Oedipus_DramaHelper::get_frame_by_id($_POST['frame_id']);

			if (isset($_POST['note_text']))
			{
				Oedipus_NotesHelper::add_note_to_frame(
					$frame,
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
		if (isset($_POST['view_frame_id']))
		{
			$this->get_variables['view_frame_id'] = $_POST['view_frame_id'];
		}

		$return_to_url = $this->get_return_to_url();
		$this->set_return_to_url($return_to_url);
	}
	
	protected function
		get_return_to_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaPage', $this->get_variables);
	}

}
?>
