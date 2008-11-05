<?php
/**
 * Oedipus_AddDramaHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for adding Dramas
 *
 */

class
	Oedipus_AddDramaHTMLForm
extends
	HTMLTags_SimpleOLForm
{

	public function
		__construct($user_id)
	{
		parent::__construct('new_drama');

		$this->set_legend_text('New Drama');

		// action
		$this_action = $this->get_new_drama_form_action_url();
		$this->set_action($this_action);

		// cancel
		$this_cancel = $this->get_new_drama_form_cancel_url();
		$this->set_cancel_location($this_cancel);

		// Drama Name Input
		$this->add_input_name_with_value('drama_name', '', 'Drama Name:');
		// Hidden Inputs
		$this->add_hidden_input('new_drama', 1);
		$this->add_hidden_input('user_id', $user_id);

		$this->set_submit_text('Create Drama');
	}

	private function
		get_new_drama_form_action_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditDramaRedirectScript');
	}

	private function
		get_new_drama_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaPage');
	}
}
?>
