<?php
/**
 * Oedipus_AddTableHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for adding tables
 *
 */

class
	Oedipus_AddTableHTMLForm
extends
	HTMLTags_SimpleOLForm
{
	private $drama;

	public function
		__construct(Oedipus_Drama $drama)
	{
		parent::__construct('new_table');

		$this->drama = $drama;

		$this->set_legend_text('New table');

		// action
		$this_action = $this->get_new_table_form_action_url();
		$this->set_action($this_action);

		// cancel
		$this_cancel = $this->get_new_table_form_cancel_url();
		$this->set_cancel_location($this_cancel);

		// table Name Input
		$this->add_input_name_with_value('table_name', '', 'table Name:');

		// Hidden Inputs
		$this->add_hidden_input('drama_id', $this->drama->get_id());
		$this->add_hidden_input('add_table', 1);

		$this->set_submit_text('Create table');
	}

	private function
		get_new_table_form_action_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorRedirectScript');
	}

	private function
		get_new_table_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage');
	}
}
?>
