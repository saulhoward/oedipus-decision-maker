<?php
/**
 * Oedipus_EditTableNoteHTMLForm
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
Oedipus_EditTableNoteHTMLForm
extends
Oedipus_EditNoteHTMLForm
{
//        private $drama;
//        private $note;

	public function
		__construct(Oedipus_Note $note, Oedipus_Drama $drama)
	{
		parent::__construct($note, 'edit-table-note');

//                $this->drama = $drama;
//                $this->note = $note;

		# Note Text Input
		$this->add_textarea_with_value('note_text', $note->get_note_text(), 'Note');

		# action
		#
		$this_action = $this->get_table_note_editor_form_action_url();
		$this->set_action($this_action);

		# Hidden Inputs
		$this->add_hidden_input('edit_note', 1);
		$this->add_hidden_input('drama_id', $drama->get_id());
		$this->add_hidden_input('note_id', $note->get_id());
	}

	# FORM URLS
	private function
		get_table_note_editor_form_action_url()
	{
		return PublicHTML_URLHelper::get_oo_page_url(
			'Oedipus_EditTableNoteRedirectScript'
		);
	}
}
?>
