<?php
class
	Oedipus_DramaEditorRedirectScript
extends
	PublicHTML_RedirectScript
{
	protected function
		do_actions()
	{

//                print_r($_POST);exit;
		$return_to_url = $this->get_redirect_script_return_url();

		if (
			isset($_POST['new_drama'])
			&&
			isset($_POST['drama_name'])
			&&
			isset($_POST['user_id'])
			)
		{
			$drama = Oedipus_DramaEditorHelper::add_drama($_POST['drama_name'], $_POST['user_id']);
			$return_to_url = Oedipus_DramaEditorHelper::get_drama_editor_url($drama);
		}
	
		elseif (
			isset($_POST['add_table'])
			&&
			isset($_POST['table_name'])
			&&
			isset($_POST['drama_id'])
			)
		{
			$drama = Oedipus_DramaEditorHelper::get_drama_by_id($_POST['drama_id']);

			# ---------------------------------
			# Add a default table for the drama
			# ---------------------------------
			$table = Oedipus_DramaEditorHelper::add_table($drama, $_POST['table_name']);
			$drama->add_table($table);

			# ---------------------------------
			# Add a default note for the table
			# ---------------------------------
			$note = $this->add_default_note_to_table($table);

			$return_to_url = Oedipus_DramaEditorHelper::get_drama_editor_url($drama);
		} 
		elseif (
			isset($_POST['edit_drama_status'])
			&&
			isset($_POST['status'])
			&&
			isset($_POST['drama_id'])
			)
		{
			Oedipus_DramaEditorHelper::set_drama_status($_POST['drama_id'], $_POST['status']);
			$return_to_url = Oedipus_DramaEditorHelper::get_share_drama_url($_POST['drama_id']);
		}
	
		$this->set_return_to_url($return_to_url);
	}


	private function
		add_default_note_to_table(Oedipus_Table $table)
	{
		$note_text = <<<TXT
This is an Oedipus Options Table.
TXT;

		return Oedipus_NotesHelper::add_note_to_table($table, $note_text);
	}

	private function
		get_redirect_script_return_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage');
	}

}
?>
