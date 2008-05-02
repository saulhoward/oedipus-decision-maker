<?php
/**
 * Oedipus_OedipusTableNameEditorHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing tables' names
 * extends Oedipus_TableEditorHTMLForm
 */

class
Oedipus_OedipusTableNameEditorHTMLForm
extends
Oedipus_OedipusTableEditorHTMLForm
{
	//        private $table;

	public function
		__construct(Oedipus_Table $table)
	{
		parent::__construct($table, 'table_name_editor');

		//                $this->table = $table;

		# Table Name Input
		$this->add_input_name_with_value('table_name', $table->get_name(), 'Table');
	}
}
?>
