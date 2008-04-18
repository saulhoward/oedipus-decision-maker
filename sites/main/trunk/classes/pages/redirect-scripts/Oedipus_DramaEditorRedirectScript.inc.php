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
		$return_to_url = Oedipus_DramaEditorHelper::get_redirect_script_return_url();

		if (
			isset($_POST['new_drama'])
			&&
			isset($_POST['drama_name'])
			)
		{
			$drama = Oedipus_DramaEditorHelper::add_drama($_POST['drama_name']);
			$return_to_url = Oedipus_DramaEditorHelper::get_drama_editor_url($drama);
		}
	
		elseif (
			isset($_POST['new_table'])
			&&
			isset($_POST['table_name'])
			&&
			isset($_POST['drama_unique_name'])
			)
		{
			$drama = Oedipus_DramaEditorHelper::get_drama_by_unique_name($_POST['drama_unique_name']);
			$table = Oedipus_DramaEditorHelper::add_table($drama, $_POST['table_name']);
			$drama->add_table($table);
			$return_to_url = Oedipus_DramaEditorHelper::get_drama_editor_url($drama);
		} 
		$this->set_return_to_url($return_to_url);
	}
}
?>
