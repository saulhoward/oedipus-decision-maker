<?php
/**
 * Oedipus_AddFrameHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for adding frames
 *
 */

class
	Oedipus_AddFrameHTMLForm
extends
	HTMLTags_SimpleOLForm
{
	private $scene;

	public function
		__construct(Oedipus_Scene $scene)
	{
		parent::__construct('new_frame');

		$this->scene = $scene;

		$this->set_legend_text('New Frame');

		// action
		$this_action = $this->get_new_frame_form_action_url();
		$this->set_action($this_action);

		// cancel
		$this_cancel = $this->get_new_frame_form_cancel_url();
		$this->set_cancel_location($this_cancel);

		// frame Name Input
		$this->add_input_name_with_value('frame_name', '', 'Frame Name:');

		// Hidden Inputs
		$this->add_hidden_input('scene_id', $this->scene->get_id());
		$this->add_hidden_input('add_frame', 1);

		$this->set_submit_text('Create Frame');
	}

	private function
		get_new_frame_form_action_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditSceneRedirectScript');
	}

	private function
		get_new_frame_form_cancel_url()
	{
		/* Assuming we're on the Edit Drama Page */
		$drama_id = Oedipus_DramaHelper
			::get_drama_id_for_scene_id($this->scene->get_id());
		return Oedipus_DramaHelper
			::get_edit_drama_page_url_for_drama_id($drama_id);
	}
}
?>
