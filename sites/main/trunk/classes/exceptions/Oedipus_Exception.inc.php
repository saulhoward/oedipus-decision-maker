<?php
/**
 * Oedipus_Exception
 *
 * @copyright SANH, 2008-11-12
 */

class
    Oedipus_Exception
extends
    Exception
{
    public function
        __construct($value)
    {
        parent::__construct(
		$value
        );
    }
}
?>
