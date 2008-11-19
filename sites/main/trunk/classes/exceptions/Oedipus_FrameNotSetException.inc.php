<?php
/**
 * Oedipus_FrameNotSetException
 *
 * @copyright SANH, 2008-11-12
 */

class
    Oedipus_FrameNotSetException
extends
    Oedipus_Exception
{
    public function
        __construct($class_at_fault)
    {
        parent::__construct(
            "Frame not set in class $class_at_fault"
        );
    }
}
?>
