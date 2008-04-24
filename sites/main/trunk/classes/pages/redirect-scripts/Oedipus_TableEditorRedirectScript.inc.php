<?php
class
	Oedipus_TableEditorRedirectScript
extends
	PublicHTML_RedirectScript
{
	protected function
		do_actions()
	{
		$return_to_url = Oedipus_TableCreationHelper::process_table_editor_form();
		$this->set_return_to_url($return_to_url);
	}
}
?>
