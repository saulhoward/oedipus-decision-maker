<?php
class
	Oedipus_EditTableNoteRedirectScript
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
			isset($_POST['table_id'])
		)
		{
			$this->drama_id = $_POST['drama_id'];
			$table = Oedipus_TableCreationHelper::get_oedipus_table_by_id($_POST['table_id']);

			if (isset($_POST['note_text']))
			{
				Oedipus_NotesHelper::add_note_to_table(
					$table,
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
			::get_oo_page_url('Oedipus_DramaEditorPage', $get_variables);
	}

}
?>
