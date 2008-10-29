<?php
/**
 * Oedipus_PageActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
	Oedipus_PageActionsUL
extends
	HTMLTags_UL
{
	public function
		__construct()
	{
		parent::__construct();
		
		$this->set_attribute_str('class', 'page-actions');
	}
}
?>
