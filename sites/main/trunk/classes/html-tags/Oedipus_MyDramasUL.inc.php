<?php
/**
 * Oedipus_MyDramasUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
Oedipus_MyDramasUL
extends
Oedipus_DramasUL
{
	private $user_id;

	public function
		__construct($user_id)
	{
		$this->user_id = $user_id;
		parent::__construct();
	}

	protected function
		get_dramas()
	{
		return Oedipus_DramaHelper::get_all_dramas_for_user($this->user_id);
	}
}
?>