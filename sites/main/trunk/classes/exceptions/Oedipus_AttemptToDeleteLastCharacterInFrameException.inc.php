<?php
/**
 * Oedipus_AttemptToDeleteLastCharacterInFrameException
 *
 * @copyright SANH, 2008-11-12
 */

class
    Oedipus_AttemptToDeleteLastCharacterInFrameException
extends
    Oedipus_Exception
{
    public function
        __construct($character_id)
    {
        parent::__construct(
            "Cannot delete last character in frame (id $character_id)."
        );
    }
}
?>
