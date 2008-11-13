<?php
/**
 * Oedipus_ShareDramaPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 * @copyright 2008-04-27, SANH
 */

class
Oedipus_ShareDramaPage
extends
Oedipus_DramaPage
{
	protected function
		get_drama_div()
	{
                /*
		 * Oedipus_ShareDramaDiv is a Drama 
		 * view that extends Oedipus_DramaDiv 
                 */
		return new Oedipus_ShareDramaDiv(
			$this->get_drama()
		);
	}
}
?>
