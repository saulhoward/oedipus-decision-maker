<?php
/**
 * Oedipus_OedipusTableEditorPageOptionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
	Oedipus_OedipusTableEditorPageOptionsUL
extends
	HTMLTags_UL
{
	private $table;

	public function
		__construct(Oedipus_Table $table)
	{
		parent::__construct();

		$this->table = $table;
		
		$this->set_attribute_str('class', 'table-editor-page-options');
		
		// Link to edit the table

		$back_to_drama_li = $this->get_back_to_drama_li();
		$this->append_tag_to_content($back_to_drama_li);
	}

	private function
		get_back_to_drama_li()
	{
		$back_to_drama_url = $this->get_back_to_drama_url();
		$link = new HTMLTags_A('Go Back to Drama');
		$link->set_href($back_to_drama_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'back-to-drama');

		return $li;
	}

	private function
		get_back_to_drama_url()
	{
		$get_variables = array("drama_id" => $this->table->get_drama_id());

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage', $get_variables);
	}
}
?>
