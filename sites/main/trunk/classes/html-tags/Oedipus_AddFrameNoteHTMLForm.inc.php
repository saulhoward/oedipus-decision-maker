<?php
/**
 * Oedipus_AddFrameNoteHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing frames' notes
 * extends Oedipus_EditNoteHTMLForm
 */

class
Oedipus_AddFrameNoteHTMLForm
extends
Oedipus_AddNoteHTMLForm
{
	private $drama;
	private $frame;

	public function
		__construct($drama_id, Oedipus_Frame $frame)
	{
		parent::__construct('add-frame-note');

		# Note Text Input
		$this->add_textarea_with_value('note_text', '', 'Note');

		# action
		$this_action = $this->get_frame_note_editor_form_action_url();
		$this->set_action($this_action);

		# Hidden Inputs
		$this->add_hidden_input('drama_id', $drama_id);
		$this->add_hidden_input('frame_id', $frame->get_id());
		$this->add_hidden_input('add_note', 1);
	}

	# FORM URLS
	private function
		get_frame_note_editor_form_action_url()
	{
		return PublicHTML_URLHelper::get_oo_page_url(
			'Oedipus_EditFrameNoteRedirectScript'
		);

	}
}
?>
