<?php
/**
 * Oedipus_AddTableNoteHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing tables' notes
 * extends Oedipus_EditNoteHTMLForm
 */

class
Oedipus_AddTableNoteHTMLForm
extends
Oedipus_AddNoteHTMLForm
{
	private $drama;
	private $table;

	public function
		__construct(Oedipus_Drama $drama, Oedipus_Table $table)
	{
		parent::__construct('add-table-note');

		# Note Text Input
		$this->add_textarea_with_value('note_text', '', 'Note');

		# action
		$this_action = $this->get_table_note_editor_form_action_url();
		$this->set_action($this_action);

		# Hidden Inputs
		$this->add_hidden_input('drama_id', $drama->get_id());
		$this->add_hidden_input('table_id', $table->get_id());
		$this->add_hidden_input('add_note', 1);
	}

	# FORM URLS
	private function
		get_table_note_editor_form_action_url()
	{
//                $get_variables = array("note_id" => $this->note->get_id(),"drama_id" => $this->drama->get_id());
		return PublicHTML_URLHelper::get_oo_page_url(
			'Oedipus_EditTableNoteRedirectScript',
			$get_variables
		);
	}
}
?>
