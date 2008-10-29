<?php
/**
 * Oedipus_EditFrameFrameActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *
 *  Options like 'add new character'
 */

class
	Oedipus_EditFrameFrameActionsUL
extends
	Oedipus_EditFrameActionsUL
{
	private $frame;

	public function
		__construct(Oedipus_Frame $frame)
	{
		parent::__construct();

		$this->frame = $frame;
		
		// Link to add_new_character the frame

		$add_new_character_li = $this->get_add_new_character_li();
		$this->append_tag_to_content($add_new_character_li);
	}

	private function
		get_add_new_character_li()
	{
		$add_new_character_url = $this->get_add_new_character_url();
		$link = new HTMLTags_A('add a new character');
		$link->set_href($add_new_character_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'add_new_character');

		return $li;
	}

	private function
		get_add_new_character_url()
	{
		$get_variables = array(
			"frame_id" => $this->frame->get_id(),
			"new_character" => 1
		);

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditFrameRedirectScript', $get_variables);
	}
}
?>
