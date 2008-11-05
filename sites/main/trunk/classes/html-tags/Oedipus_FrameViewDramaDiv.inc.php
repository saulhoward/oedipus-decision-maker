<?php
/**
 * Oedipus_FrameViewDramaDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * FrameView version of the
 * Main Drama Div
 *
 */

class
	Oedipus_FrameViewDramaDiv
extends
	Oedipus_DramaDiv
{
	protected $frame_id;
	
	public function
		__construct(Oedipus_Drama $drama, $frame_id = NULL)
	{
		$this->frame_id = $frame_id;
		parent::__construct($drama);
	}

	protected function
		get_scene_div(Oedipus_Scene $scene)
	{
		//print_r($this->frame_id);exit;
		$scene_div = new HTMLTags_Div();
		$scene_div->set_attribute_str('class', 'scene');

		$scene_div->append('<h3>' . $scene->get_name() . '</h3>');

                /*
		 * Set Frame, and set if editable
                 */
		if ($this->frame_id == NULL)
		{
			$frame = $scene->get_root_frame();
		}
		else
		{
			$frame = $scene->get_frame($this->frame_id);
		}

		if ($this->drama->is_drama_editable())
		{
			$frame->make_editable();
		}

                /*
		 *Get the Div
                 */
		$scene_div->append(
			$this->get_frame_div($frame)
		);
		/*
		 * Get the Navigation Div
		 */
		$scene_div->append(
			$this->get_frame_navigation_div($frame)
		);

		return $scene_div;
	}

	protected function
		get_frame_div(Oedipus_Frame $frame)
	{
		return new Oedipus_FrameDiv($frame);
	}

	private function
		get_frame_navigation_div(Oedipus_Frame $frame)
	{
		return Oedipus_FrameTreeHelper::get_frame_navigation_div($frame);
	}

}
?>
