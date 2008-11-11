<?php
/**
 * Oedipus_RedirectScript
 *
 * @copyright 2008-11-12, SANH
 */

class
	Oedipus_RedirectScript
extends
	PublicHTML_RedirectScript
{
	protected $return_message;

	protected function
		do_actions()
	{

	}

	protected function
		get_return_message()
	{
		return urlencode($this->return_message);
	}

	protected function
		set_return_message($msg)
	{
		$this->return_message = $msg;
	}
}
?>
