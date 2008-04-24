<?php
/**
 * Oedipus_OedipusTableOptionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
	Oedipus_OedipusTableOptionsUL
extends
	HTMLTags_UL
{
	private $table;

	public function
		__construct(Oedipus_Table $table)
	{
		parent::__construct();

		$this->table = $table;
		
		$this->set_attribute_str('class', 'table-options');
		
		// Link to edit the table

		$edit_li = $this->get_edit_li();
		$this->append_tag_to_content($edit_li);
	}

	private function
		get_edit_li()
	{
		$edit_url = $this->get_edit_url();
		$link = new HTMLTags_A('Edit this Table');
		$link->set_href($edit_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'edit-table');

		return $li;
	}

	private function
		get_edit_url()
	{
		$get_variables = array("table_id" => $this->table->get_id());

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableEditorPage', $get_variables);
	}
}
?>