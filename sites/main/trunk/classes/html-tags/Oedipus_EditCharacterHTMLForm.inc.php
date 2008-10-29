<?php
/**
 * Oedipus_EditCharacterHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing characters' values
 * extends Oedipus_FrameEditorHTMLForm
 */

class
Oedipus_EditCharacterHTMLForm
extends
Oedipus_EditFrameHTMLForm
{
	//        private $frame;

	public function
		__construct(Oedipus_Frame $frame, Oedipus_Character $character)
	{
		parent::__construct($frame, 'character_editor');

		//                $this->frame = $frame;


		# Name Input
		$this->add_input_name_with_value(
			'character_name', $character->get_name(), 'character'
		);
		# color Input
		$this->add_input_name_with_value(
			'character_color', $character->get_color(), 'Color'
		);

		# Hidden Inputs
		$this->add_hidden_input('character_id', $character->get_id());
	}
}
?>
