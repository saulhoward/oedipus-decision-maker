<?php
/**
 * Oedipus_FramePNGConfigValueNotSetException
 *
 * @copyright SANH, 2008-11-12
 */

class
    Oedipus_FramePNGConfigValueNotSetException
extends
    Oedipus_Exception
{
    public function
        __construct($config_value_not_set)
    {
        parent::__construct(
            "Config value $config_value_not_set not set."
        );
    }
}
?>
