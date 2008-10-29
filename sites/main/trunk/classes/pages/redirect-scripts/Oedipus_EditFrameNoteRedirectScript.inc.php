<?php
class
	Oedipus_EditFrameNoteRedirectScript
extends
	PublicHTML_RedirectScript
{
	private $note_id;
	private $drama_id;

	protected function
		do_actions()
	{
		$return_to_url = $this->get_return_to_url();

		/*
		 * The $_POST
		 */
		//print_r($_POST);exit;
		if (
			isset($_POST['edit_note'])
			&&
			isset($_POST['note_id'])
			&&
			isset($_POST['drama_id'])
		)
		{
			$this->note_id = $_POST['note_id'];
			$this->drama_id = $_POST['drama_id'];

			if (isset($_POST['note_text']))
			{
				Oedipus_NotesHelper::set_note_text(
					$this->note_id,
					$_POST['note_text']
				);
			}
		}
		elseif (
			isset($_POST['add_note'])
			&&
			isset($_POST['drama_id'])
			&&
			isset($_POST['frame_id'])
		)
		{
			$this->drama_id = $_POST['drama_id'];
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


		$this->set_return_to_url($return_to_url);
	}
	
	protected function
		get_return_to_url()
	{
		$get_variables = array();

		if (isset($this->drama_id))
		{
			$get_variables = array("drama_id" => $this->drama_id);

		}

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditDramaPage', $get_variables);
	}

}
?>
