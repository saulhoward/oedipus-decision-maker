<?php
/**
 * Oedipus_OedipusDramaPageOptionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-04-27, SANH
 */

class
	Oedipus_OedipusDramaPageOptionsUL
extends
	HTMLTags_UL
{
	private $drama;

	public function
		__construct(Oedipus_Drama $drama)
	{
		parent::__construct();

		$this->drama = $drama;
		
		$this->set_attribute_str('class', 'drama-page-options');
		
		// Link to edit the table

		$edit_this_drama_li = $this->get_edit_this_drama_li();
		$this->append_tag_to_content($edit_this_drama_li);
	}

	private function
		get_edit_this_drama_li()
	{
		$edit_this_drama_url = $this->get_edit_this_drama_url();
		$link = new HTMLTags_A('Edit this Drama');
		$link->set_href($edit_this_drama_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'edit-drama');

		return $li;
	}

	private function
		get_edit_this_drama_url()
	{
		$get_variables = array("drama_id" => $this->drama->get_id());

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage', $get_variables);
	}
}
?>
