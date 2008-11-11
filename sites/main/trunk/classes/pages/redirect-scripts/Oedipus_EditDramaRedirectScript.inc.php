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
			isset($_POST['user_id'])
			)
		{
			if (isset($_POST['drama_name']))
			{
				$drama_name = $_POST['drama_name'];
			}
			else
			{
				$drama_name = Oedipus_DramaHelper::get_new_drama_name();
			}
			$drama = Oedipus_DramaEditorHelper::add_drama(
				$drama_name, $_POST['user_id']
			);

			// A drama needs at least one act and an act, one scene.
			$act = Oedipus_DramaEditorHelper::add_act($drama);
			$scene = Oedipus_DramaEditorHelper::add_scene($act);
			$frame = Oedipus_DramaHelper::add_frame($scene, 'First frame', '0');

			$return_to_url = 
				Oedipus_DramaHelper::get_drama_page_url($drama);
		}
		elseif (
			isset($_GET['add_act'])
			&&
			isset($_GET['drama_id'])
		)
		{
			$drama = Oedipus_DramaHelper::get_drama_by_id(
				$_GET['drama_id']
			);

			// an act, one scene.
			$act = Oedipus_DramaEditorHelper::add_act($drama);
			$scene = Oedipus_DramaEditorHelper::add_scene($act);
			$frame = Oedipus_DramaHelper::add_frame($scene, 'First frame', '0');

			$return_to_url = 
				Oedipus_DramaHelper
				::get_drama_page_url_for_act_id(
					$act->get_id()
				);
		}

		elseif (
			isset($_POST['edit_drama_status'])
			&&
			isset($_POST['status'])
			&&
			isset($_POST['drama_id'])
			)
		{
			Oedipus_DramaEditorHelper
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
			::get_oo_page_url('Oedipus_DramaPage');
	}
}
?>
