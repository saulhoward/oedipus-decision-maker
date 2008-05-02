<?php
/**
 * Oedipus_OedipusOptionEditorHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing options' values
 * extends Oedipus_TableEditorHTMLForm
 */

class
Oedipus_OedipusOptionEditorHTMLForm
extends
Oedipus_OedipusTableEditorHTMLForm
{
	//        private $table;

	public function
		__construct(Oedipus_Table $table, Oedipus_Option $option, $iteration)
	{
		parent::__construct($table, 'option_editor');

		//                $this->table = $table;

		# Name Input
		$this->add_input_name_with_value(
			'option_name', $option->get_name(), 'Option&nbsp;' . $iteration
		);

		# Hidden Inputs
		$this->add_hidden_input('option_id', $option->get_id());
	}
}
?>
