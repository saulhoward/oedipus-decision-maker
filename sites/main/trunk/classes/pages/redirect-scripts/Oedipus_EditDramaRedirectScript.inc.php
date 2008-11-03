<?php
class
	Oedipus_EditDramaRedirectScript
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
			$drama = Oedipus_DramaEditorHelper::add_drama(
				$_POST['drama_name'], $_POST['user_id']
			);

			// A drama needs at least one act and an act, one scene.
			$act = Oedipus_DramaEditorHelper::add_act($drama);
			$scene = Oedipus_DramaEditorHelper::add_scene($act);
			$frame = Oedipus_DramaHelper::add_frame($scene, 'First frame');

			$return_to_url = 
				Oedipus_DramaEditorHelper::get_drama_editor_url($drama);
		}
		elseif (
			isset($_POST['edit_drama_status'])
			&&
			isset($_POST['status'])
			&&
			isset($_POST['drama_id'])
			)
		{
			Oedipus_DramaHelper
				::set_drama_status($_POST['drama_id'], $_POST['status']);
			$return_to_url = Oedipus_DramaHelper
				::get_share_drama_url($_POST['drama_id']);
		}
	
		$this->set_return_to_url($return_to_url);
	}

	private function
		get_redirect_script_return_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditDramaPage');
	}
}
?>
