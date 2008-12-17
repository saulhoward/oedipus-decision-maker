<?php
/**
 * Oedipus_MyDramasListDiv
 *
 *  2008-12-12, SANH
 */

class
Oedipus_MyDramasListDiv
extends
Oedipus_DramaListDiv
{
	private $user_id;

	public function
		__construct($user_id)
	{
		$this->set_user_id($user_id);
		parent::__construct();
	}

	private function
		set_user_id($user_id)
	{
		$this->user_id = $user_id;
	}

	private function
		get_user_id()
	{
		if (isset($this->user_id)) {
			return $this->user_id;
		} else {
			throw new 
				Oedipus_UserIDNotSetException(
					'In the Drama List'
				);
		}
	}

	protected function
		get_dramas_list()
	{
		return Oedipus_DramaHelper
			::get_all_dramas_for_user(
				$this->get_user_id()
			);
	}
}
?>
