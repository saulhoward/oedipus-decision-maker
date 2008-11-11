<?php
/**
 * Oedipus_EditDramaStatusHTMLForm
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
	Oedipus_EditDramaStatusHTMLForm
extends
	HTMLTags_SimpleOLForm
{
	private $drama;

	public function
		__construct(Oedipus_Drama $drama)
	{
		parent::__construct('edit_drama_status');

		$this->drama = $drama;

		$this->set_legend_text('Drama Status');

		// action
		$this_action = $this->get_edit_drama_status_form_action_url();
		$this->set_action($this_action);

		// cancel
		$this_cancel = $this->get_edit_drama_status_form_cancel_url();
		$this->set_cancel_location($this_cancel);

		// Drama Status Input
//                $this->add_input_name_with_value('drama_name', '', 'Drama Name:');
		//
		foreach ($this->drama->get_possible_status_values() as $status_option)
		{
			$input_li = $this->get_status_radio_button_li($status_option);
			$this->add_input_li($input_li);
		}

		// Hidden Inputs
		$this->add_hidden_input('edit_drama_status', 1);
		$this->add_hidden_input('drama_id', $this->drama->get_id());

		$this->set_submit_text('Set Status');
	}

	private function
		get_edit_drama_status_form_action_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditDramaRedirectScript');
	}

	private function
		get_edit_drama_status_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_ShareDramaPage');
	}

	private function
		get_status_radio_button_li($name)
	{
		$input_tag = new HTMLTags_Input();
		$input_tag->set_attribute_str('type', 'radio');
		$input_tag->set_attribute_str('name', 'status');
		$input_tag->set_attribute_str('id', $name);
		$input_tag->set_attribute_str('value', $name);

		if ($this->drama->get_status() == $name)
		{
			$input_tag->set_attribute_str('checked', 'checked');
		}

		$input_li = new HTMLTags_LI();
		$input_li->append_tag_to_content($input_tag);
	
		$input_label = new HTMLTags_Label(ucfirst($name));
		$input_label->set_attribute_str('for', $name);
		$input_label->set_attribute_str('class', 'radio');
		
		$input_li->append_tag_to_content($input_label);
		
		return $input_li;
	}
}
?>
