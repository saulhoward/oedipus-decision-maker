<?php
/**
 * Oedipus_FrameViewSceneDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * FrameView version of the
 * Main SceneDiv
 *
 */

class
	Oedipus_FrameViewSceneDiv
extends
	Oedipus_SceneDiv
{
	protected $frame_id;
	protected $scene;
	
	public function
		__construct(Oedipus_Scene $scene, $frame_id = NULL)
	{
		$this->frame_id = $frame_id;
		parent::__construct($scene);
	}

	protected function
		get_scene_content_div()
	{
		$div = new HTMLTags_Div();

		/*
		 * Set Frame, and set if editable
		 */
		if ($this->frame_id == NULL)
		{
			$frame = $this->scene->get_root_frame();
		}
		else
		{
			$frame = $this->scene->get_frame($this->frame_id);
		}

		if ($this->scene->is_editable())
		{
			$frame->make_editable();
		}

		/*
		 *Get the Div
		 */
		$div->append(
			$this->get_frame_div($frame)
		);
		return $div;
	}

	protected function
		get_frame_div(Oedipus_Frame $frame)
	{
		return new Oedipus_FrameDiv($frame);
	}
}
?>
