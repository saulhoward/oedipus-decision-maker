<?php
/**
 * Oedipus_EditFramePageOptionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
	Oedipus_EditFramePageActionsUL
extends
	Oedipus_PageActionsUL
{
	private $frame;

	public function
		__construct(Oedipus_Frame $frame)
	{
		parent::__construct();

		$this->frame = $frame;
		
		// Link to edit the frame

		$back_to_drama_li = $this->get_back_to_drama_li();
		$this->append_tag_to_content($back_to_drama_li);
	}

	private function
		get_back_to_drama_li()
	{
		$back_to_drama_url = $this->get_back_to_drama_url();
		$link = new HTMLTags_A('Save and Return');
		$link->set_href($back_to_drama_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'back-to-drama');

		return $li;
	}

	private function
		get_back_to_drama_url()
	{
		$get_variables = array("drama_id" => $this->frame->get_drama_id());

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditDramaPage', $get_variables);
	}
}
?>
