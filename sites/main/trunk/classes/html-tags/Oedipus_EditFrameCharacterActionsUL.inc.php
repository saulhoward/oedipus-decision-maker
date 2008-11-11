<?php
/**
 * Oedipus_EditFrameCharacterActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *
 *  Options like 'add new character'
 */

class
	Oedipus_EditFrameCharacterActionsUL
extends
	Oedipus_EditFrameActionsUL
{
	private $character;
	private $frame;

	public function
		__construct(Oedipus_Frame $frame, Oedipus_Character $character)
	{
		parent::__construct();

		$this->frame = $frame;
		$this->character = $character;
			
		// Link to delete_character 
		$delete_character_li = $this->get_delete_character_li();
		$this->append_tag_to_content($delete_character_li);
	
		// Link to add_option 
		$add_option_li = $this->get_add_option_li();
		$this->append_tag_to_content($add_option_li);
	}

	private function
		get_delete_character_li()
	{
		$delete_character_url = $this->get_delete_character_url();
		$link = new HTMLTags_A('delete this character');
		$link->set_href($delete_character_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'delete_character');

		return $li;
	}

	private function
		get_add_option_li()
	{
		$add_option_url = $this->get_add_option_url();
		$link = new HTMLTags_A('add new Option');
		$link->set_href($add_option_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'add_option');

		return $li;
	}

	/*
	 * URL Functions
	 */
	private function
		get_delete_character_url()
	{
		$get_variables = array(
			"frame_id" => $this->frame->get_id(),
			"character_id" => $this->character->get_id(),
			"delete_character" => 1
		);

                /*
		 *If we're on the edit_frame section of Drama Page,
		 * pass this on to set the return to correctly
                 */
		if (isset($_GET['edit_frame'])) {
			$get_variables['return_to_get'] = 'edit_frame';
		}
	

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditFrameRedirectScript', $get_variables);
	}

	private function
		get_add_option_url()
	{
		$get_variables = array(
			"frame_id" => $this->frame->get_id(),
			"character_id" => $this->character->get_id(),
			"add_option" => 1
		);

                /*
		 *If we're on the edit_frame section of Drama Page,
		 * pass this on to set the return to correctly
                 */
		if (isset($_GET['edit_frame'])) {
			$get_variables['return_to_get'] = 'edit_frame';
		}

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditFrameRedirectScript', $get_variables);
	}
}
?>
