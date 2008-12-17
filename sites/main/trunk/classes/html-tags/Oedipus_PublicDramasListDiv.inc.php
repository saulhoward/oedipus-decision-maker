<?php
/**
 * Oedipus_PublicDramasListDiv
 *
 *  2008-12-12, SANH
 */

class
Oedipus_PublicDramasListDiv
extends
Oedipus_DramaListDiv
{
	protected function
		get_dramas_list()
	{
		return Oedipus_DramaHelper
			::get_latest_public_dramas();
	}
}
?>
