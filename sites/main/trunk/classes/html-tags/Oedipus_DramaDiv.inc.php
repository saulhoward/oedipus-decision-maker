<?php
/**
 * Oedipus_DramaDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Main Drama Div
 *
 */

class
	Oedipus_DramaDiv
extends
	HTMLTags_Div
{
	protected $drama;

	public function
		__construct(Oedipus_Drama $drama)
	{
		//print_r($drama);exit;

		parent::__construct();

		$this->drama = $drama;

		$this->set_attribute_str('class', 'drama');

		$this->append_tag_to_content(
			$this->get_drama_actions_ul($drama)
		);
		$this->append_tag_to_content(
			$this->get_drama_heading($drama)
		);

		/*
		 * SHOW THE ACTS
		 */
		foreach ($drama->get_acts() as $act)
		{
			$this->append($this->get_act_div($act));
		}
	}

	protected function
		get_drama_actions_ul()
	{
		return new Oedipus_DramaPageActionsUL(
			$this->drama
		);
	}

	protected function
		get_drama_heading()
	{
		$heading = new HTMLTags_Heading(2);
		//                $span = new HTMLTags_Span('Drama:&nbsp;');
		//                $span->set_attribute_str('class', 'edit-text');
		//                $heading->append_tag_to_content($span);
		$heading->append_str_to_content($this->drama->get_name());
		return $heading;
	}

	protected function
		get_act_div(Oedipus_Act $act)
	{
		$act_div = new HTMLTags_Div();
		$act_div->set_attribute_str('class', 'act');

		$act_div->append('<h3>' . $act->get_name() . '</h3>');
		// SHOW THE Scenes
		foreach ($act->get_scenes() as $scene)
		{
			//                        print_r($scene);exit;
			$act_div->append($this->get_scene_div($scene));
		}

		return $act_div;
	}

	protected function
		get_scene_div(Oedipus_Scene $scene)
	{
		$scene_div = new HTMLTags_Div();
		$scene_div->set_attribute_str('class', 'scene');

		$scene_div->append('<h3>' . $scene->get_name() . '</h3>');

                /*
		 * Using Tree View
                 */
		if ($this->drama->is_editable())
		{
			$scene->make_editable();
		}
		$scene_div->append(
			Oedipus_FrameTreeHelper::get_frame_tree_div($scene)
		);

//                foreach ($scene->get_frames() as $frame)
//                {
//                        $scene_div->append($this->get_frame_div($frame));
//                }

		return $scene_div;
	}

	protected function
		get_frame_div(Oedipus_Frame $frame)
	{
//                $frame_div = new HTMLTags_Div();
//                $frame_div->set_attribute_str('class', 'frame');

//                $frame_div->append('<h3>' . $frame->get_name() . '</h3>');
//                $frame_div->append(
//                        Oedipus_FrameImageHelper::get_frame_png_thumbnail_img_a($frame, 150, 100)
//                );
//                return $frame_div;
	}

	protected function
		get_new_drama_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaPage');
	}
}
?>
