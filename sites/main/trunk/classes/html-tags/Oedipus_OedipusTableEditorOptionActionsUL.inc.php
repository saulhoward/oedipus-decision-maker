<?php
/**
 * Oedipus_OedipusTableEditorOptionActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *
 *  Options like 'delete thiss option'
 */

class
	Oedipus_OedipusTableEditorOptionActionsUL
extends
	Oedipus_OedipusTableEditorActionsUL
{
	private $option;
	private $table;

	public function
		__construct(Oedipus_Table $table, Oedipus_Option $option)
	{
		parent::__construct();

		$this->table = $table;
		$this->option = $option;
			
		// Link to delete_option 
		$delete_option_li = $this->get_delete_option_li();
		$this->append_tag_to_content($delete_option_li);
	}

	private function
		get_delete_option_li()
	{
		$delete_option_url = $this->get_delete_option_url();
		$link = new HTMLTags_A('Delete this Option');
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
			"table_id" => $this->table->get_id(),
			"option_id" => $this->option->get_id(),
			"delete_option" => 1
		);

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableEditorRedirectScript', $get_variables);
	}
}
?>
