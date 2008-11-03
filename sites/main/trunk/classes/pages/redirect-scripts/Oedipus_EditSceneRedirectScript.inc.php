<?php
class
	Oedipus_EditSceneRedirectScript
extends
	PublicHTML_RedirectScript
{
	protected function
		do_actions()
	{
		// print_r($_POST);exit;
		$return_to_url = $this->get_redirect_script_return_url();
	
		if (
			isset($_POST['add_frame'])
			&&
			isset($_POST['frame_name'])
			&&
			isset($_POST['scene_id'])
		)
		{
			/*
			 * Verify Data received?
			 * CURRENTLY UNSAFE
			 */
			$scene_id = $_POST['scene_id'];
			$frame_name = $_POST['frame_name'];

			/*
			 * Get the scene
			 */
			$scene = Oedipus_DramaHelper
				::get_scene_by_id($scene_id);

			/*
			 * Add a default frame to the scene
			 */
			$frame = Oedipus_DramaHelper::add_frame($scene, $frame_name);
			//print_r($frame);exit;

			/*
			 * Add a default note for the frame
			 */
			$note = Oedipus_NotesHelper
				::add_note_to_frame_with_default_content($frame);

                        /*
			 * Set the Return to URL,
			 * assuming we're on the EditDramaPage
                         */
			$return_to_url = Oedipus_DramaHelper
				::get_edit_drama_page_url_for_scene_id($scene_id);
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
