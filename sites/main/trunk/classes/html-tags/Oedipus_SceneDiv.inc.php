<?php
/**
 * Oedipus_SceneDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Main SceneDiv
 *
 */

class
	Oedipus_SceneDiv
extends
	HTMLTags_Div
{
	protected $scene;
	protected $act;

	public function
		__construct(Oedipus_Act $act, Oedipus_Scene $scene)
	{
		//print_r($drama);exit;

		parent::__construct();

		$this->scene = $scene;
		$this->act = $act;

		$this->set_attribute_str('class', 'scene');
		//$this->append('<h3>' . $scene->get_name() . '</h3>');
		$this->append(
			$this->get_scene_picker_ul()
		);

		$this->append(
			$this->get_scene_view_ul()
		);

		$this->append(
			$this->get_scene_content_div()
		);

//                foreach ($scene->get_frames() as $frame)
//                {
//                        $scene_div->append($this->get_frame_div($frame));
//                }

	}

	protected function
		get_scene_picker_ul()
	{
		$ul = new HTMLTags_UL();
		$ul->set_attribute_str('class', 'picker');

		foreach($this->act->get_scenes() as $scene)
		{
			$url = Oedipus_DramaHelper
				::get_drama_page_url_for_scene_id($scene->get_id());
			$li = new HTMLTags_LI();
			$a = new HTMLTags_A($scene->get_name());
			$a->set_href($url);
			if ($this->scene->get_id() == $scene->get_id())
			{
				$a->set_attribute_str('id', 'selected');
			}
			$li->append($a);
			$ul->append($li);
		}

		/**
		 * Add scene LI
		 */
		$ul->append(
			$this->get_add_scene_li()
		);

		return $ul;
	}

	protected function
		get_add_scene_li()
	{
		$li = new HTMLTags_LI();
		$a = new HTMLTags_A('Add Scene');
		$a->set_attribute_str('id', 'add');
		$a->set_attribute_str('title', 'Add a Scene');
		$a->set_href(
			Oedipus_DramaHelper
			::get_add_scene_url(
				$this->act->get_id()
			)
		);
		$li->append($a);

		return $li;
	}


	protected function
		get_scene_view_ul()
	{
		return new Oedipus_SceneViewUL($this->scene);
	}

	protected function
		get_scene_content_div()
	{
                /*
		 * Using Tree View
                 */

		$div = new HTMLTags_Div();
		$div->append(
			Oedipus_FrameTreeHelper::get_frame_tree_div($this->scene)
		);
		return $div;
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
