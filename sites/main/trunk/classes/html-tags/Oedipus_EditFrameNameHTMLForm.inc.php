<?php
/**
 * Oedipus_EditFrameNameHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing frames' names
 *
 * extends:
 * Oedipus_frameEditorHTMLForm
 */

class
Oedipus_EditFrameNameHTMLForm
extends
Oedipus_EditFrameHTMLForm
{
	public function
		__construct(Oedipus_Frame $frame)
	{
		parent::__construct($frame, 'frame_name_editor');

		# frame Name Input
		$this->add_input_name_with_value('frame_name', $frame->get_name(), 'Frame');
	}
}
?>
