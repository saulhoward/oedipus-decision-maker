<?php
/**
 * Oedipus_OedipusTableEditorTableActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *
 *  Options like 'add new actor'
 */

class
	Oedipus_OedipusTableEditorTableActionsUL
extends
	Oedipus_OedipusTableEditorActionsUL
{
	private $table;

	public function
		__construct(Oedipus_Table $table)
	{
		parent::__construct();

		$this->table = $table;
		
		// Link to add_new_actor the table

		$add_new_actor_li = $this->get_add_new_actor_li();
		$this->append_tag_to_content($add_new_actor_li);
	}

	private function
		get_add_new_actor_li()
	{
		$add_new_actor_url = $this->get_add_new_actor_url();
		$link = new HTMLTags_A('Add a new Actor');
		$link->set_href($add_new_actor_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'add_new_actor');

		return $li;
	}

	private function
		get_add_new_actor_url()
	{
		$get_variables = array(
			"table_id" => $this->table->get_id(),
			"new_actor" => 1
		);

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableEditorPage', $get_variables);
	}
}
?>
