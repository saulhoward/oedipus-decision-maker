<?php
/**
 * Oedipus_EditOptionHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing options' values
 * extends Oedipus_EditFrameHTMLForm
 */

class
Oedipus_EditOptionHTMLForm
extends
Oedipus_EditFrameHTMLForm
{
	//        private $frame;

	public function
		__construct(Oedipus_Frame $frame, Oedipus_Option $option, $iteration)
	{
		parent::__construct($frame, 'option_editor');

		//                $this->frame = $frame;

		# Name Input
		$this->add_input_name_with_value(
			'option_name', $option->get_name(), 'Option&nbsp;' . $iteration
		);

		# Hidden Inputs
		$this->add_hidden_input('option_id', $option->get_id());
	}
}
?>
