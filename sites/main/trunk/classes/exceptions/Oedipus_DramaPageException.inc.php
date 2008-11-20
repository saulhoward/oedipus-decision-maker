<?php
/**
 * Oedipus_DramaPageException
 *
 * @copyright SANH, 2008-11-12
 */

class
    Oedipus_DramaPageException
extends
    Oedipus_Exception
{
    public function
        __construct($error_str)
    {
        parent::__construct(
		$error_str
        );
    }
}
?>
