<?php
class
	Oedipus_EditActRedirectScript
extends
	Oedipus_RedirectScript
{
	protected function
		do_actions()
	{

//                print_r($_POST);exit;
		$return_to_url = $this->get_redirect_script_return_url();
		if (
			isset($_GET['add_scene'])
			&&
			isset($_GET['act_id'])
		)
		{
			$act = Oedipus_DramaHelper::get_act_by_id(
				$_GET['act_id']
			);

			// an act, one scene.
			$scene = Oedipus_DramaEditorHelper::add_scene($act);
			$frame = Oedipus_DramaHelper::add_frame($scene, 'First frame', '0');

			$return_to_url = 
				Oedipus_DramaHelper
				::get_drama_page_url_for_scene_id(
					$scene->get_id()
				);
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
