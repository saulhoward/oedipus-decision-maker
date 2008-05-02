<?php
/**
 * Oedipus_OedipusTableEditorActorActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *
 *  Options like 'add new actor'
 */

class
	Oedipus_OedipusTableEditorActorActionsUL
extends
	Oedipus_OedipusTableEditorActionsUL
{
	private $actor;
	private $table;

	public function
		__construct(Oedipus_Table $table, Oedipus_Actor $actor)
	{
		parent::__construct();

		$this->table = $table;
		$this->actor = $actor;
			
		// Link to delete_actor 
		$delete_actor_li = $this->get_delete_actor_li();
		$this->append_tag_to_content($delete_actor_li);
	
		// Link to add_option 
		$add_option_li = $this->get_add_option_li();
		$this->append_tag_to_content($add_option_li);
	}

	private function
		get_delete_actor_li()
	{
		$delete_actor_url = $this->get_delete_actor_url();
		$link = new HTMLTags_A('delete this Actor');
		$link->set_href($delete_actor_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'delete_actor');

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
		get_delete_actor_url()
	{
		$get_variables = array(
			"table_id" => $this->table->get_id(),
			"actor_id" => $this->actor->get_id(),
			"delete_actor" => 1
		);

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableEditorRedirectScript', $get_variables);
	}

	private function
		get_add_option_url()
	{
		$get_variables = array(
			"table_id" => $this->table->get_id(),
			"actor_id" => $this->actor->get_id(),
			"add_option" => 1
		);

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_TableEditorRedirectScript', $get_variables);
	}
}
?>
