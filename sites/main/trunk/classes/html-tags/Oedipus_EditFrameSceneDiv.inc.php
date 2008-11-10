<?php
/**
 * Oedipus_EditFrameSceneDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Edit FrameView version of the
 * Main FrameViewSceneDiv
 *
 */

class
	Oedipus_EditFrameSceneDiv
extends
	Oedipus_FrameViewSceneDiv
{
	public function
		__construct(Oedipus_Scene $scene, $frame_id = NULL)
	{
		parent::__construct($scene, $frame_id);
	}

	protected function
		get_frame_div(Oedipus_Frame $frame)
	{
		return new Oedipus_EditFrameDiv($frame);
	}
}
?>
