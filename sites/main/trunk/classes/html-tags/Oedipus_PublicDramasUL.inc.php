<?php
/**
 * Oedipus_PublicDramasUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
Oedipus_PublicDramasUL
extends
Oedipus_DramasUL
{
	public function
		__construct()
	{
		parent::__construct();
	}

	protected function
		get_dramas()
	{
		return Oedipus_DramaHelper::get_latest_public_dramas();
	}
}
?>
