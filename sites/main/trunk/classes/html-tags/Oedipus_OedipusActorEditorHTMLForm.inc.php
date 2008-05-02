<?php
/**
 * Oedipus_OedipusActorEditorHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing actors' values
 * extends Oedipus_TableEditorHTMLForm
 */

class
Oedipus_OedipusActorEditorHTMLForm
extends
Oedipus_OedipusTableEditorHTMLForm
{
	//        private $table;

	public function
		__construct(Oedipus_Table $table, Oedipus_Actor $actor)
	{
		parent::__construct($table, 'actor_editor');

		//                $this->table = $table;


		# Name Input
		$this->add_input_name_with_value(
			'actor_name', $actor->get_name(), 'Actor Name:'
		);
		# color Input
		$this->add_input_name_with_value(
			'actor_color', $actor->get_color(), 'Color:'
		);

		# Hidden Inputs
		$this->add_hidden_input('actor_id', $actor->get_id());
	}
}
?>
