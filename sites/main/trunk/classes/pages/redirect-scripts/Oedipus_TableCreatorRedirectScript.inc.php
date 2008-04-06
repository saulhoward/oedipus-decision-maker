<?php
class
	Oedipus_TableCreatorRedirectScript
extends
	PublicHTML_RedirectScript
{
	protected function
		do_actions()
	{
		$return_to_url = Oedipus_TableCreatorHelper::process_table_creator_form();
		$this->set_return_to_url($return_to_url);
	}
}
?>
