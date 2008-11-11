<?php
/**
 * Oedipus_EditFrameOptionActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *
 *  Options like 'delete thiss option'
 */

class
	Oedipus_EditFrameOptionActionsUL
extends
	Oedipus_EditFrameActionsUL
{
	private $option;
	private $frame;

	public function
		__construct(Oedipus_Frame $frame, Oedipus_Option $option)
	{
		parent::__construct();

		$this->frame = $frame;
		$this->option = $option;
			
		// Link to delete_option 
		$delete_option_li = $this->get_delete_option_li();
		$this->append_tag_to_content($delete_option_li);
	}

	private function
		get_delete_option_li()
	{
		$delete_option_url = $this->get_delete_option_url();
		$link = new HTMLTags_A('delete this Option');
		$link->set_href($delete_option_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'delete_option');

		return $li;
	}

	/*
	 * URL Functions
	 */
	private function
		get_delete_option_url()
	{
		$get_variables = array(
			"frame_id" => $this->frame->get_id(),
			"option_id" => $this->option->get_id(),
			"delete_option" => 1
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
