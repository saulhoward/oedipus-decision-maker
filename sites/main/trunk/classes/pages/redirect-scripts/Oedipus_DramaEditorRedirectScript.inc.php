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
	 
		$this->set_return_to_url($return_to_url);
	}
}
?>
