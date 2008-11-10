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
//                print_r($drama);exit;

		parent::__construct();

		$this->drama = $drama;

		$this->set_attribute_str('class', 'drama');

		$this->append_tag_to_content(
			$this->get_drama_heading($drama)
		);
		//$this->append_tag_to_content(
			//$this->get_drama_actions_ul($drama)
		//);

		/*
		 * Show the Selected Act
		 */
		if (isset($_GET['act_id']))
		{
			$act_id = $_GET['act_id'];	
		}
		elseif (isset($_GET['scene_id']))
		{
			$act_id = Oedipus_DramaHelper
				::get_act_id_for_scene_id(
					$_GET['scene_id']
				);
		}
		elseif (isset($_GET['frame_id']))
		{
			$act_id = Oedipus_DramaHelper
				::get_act_id_for_frame_id(
					$_GET['frame_id']
				);
		}
		else
		{
			$act_id = Oedipus_DramaHelper
				::get_first_act_id_for_drama_id(
					$this->drama->get_id()
				);
		}
		$this->append(
			$this->get_act_div(
				$this->drama->get_act($act_id)
			)
		);
	}

	protected function
		get_drama_actions_ul()
	{
		return new Oedipus_DramaActionsUL(
			$this->drama
		);
	}

	protected function
		get_drama_heading()
	{
		$heading = new HTMLTags_Heading(2);
		$heading->append_str_to_content($this->drama->get_name());
		return $heading;
	}

	protected function
		get_act_div(Oedipus_Act $act)
	{
		$act_div = new HTMLTags_Div();
		$act_div->set_attribute_str('class', 'act');

		//$act_div->append('<h3>' . $act->get_name() . '</h3>');
		$act_div->append(
			$this->get_act_picker_ul(
				$act
			)
		);
		//$act_div->append(
			//new Oedipus_ActActionsUL(
				//$act, $this->drama->get_id()
			//)
		//);

		/*
		 * Show the Selected scene
		 */
		if (isset($_GET['scene_id']))
		{
			$scene_id = $_GET['scene_id'];	
		}
		elseif (isset($_GET['frame_id']))
		{
			$scene_id = Oedipus_DramaHelper
				::get_scene_id_for_frame_id(
					$_GET['frame_id']
				);
			//print_r($scene_id);exit;
		}
		else
		{
			$scene_id = Oedipus_DramaHelper
				::get_first_scene_id_for_act_id(
					$act->get_id()
				);
		}
		$act_div->append(
			$this->get_scene_div(
				$act,
				$act->get_scene($scene_id)
			)
		);
		return $act_div;
	}

	protected function
		get_act_picker_ul(Oedipus_Act $current_act)
	{
		$ul = new HTMLTags_UL();
		$ul->set_attribute_str('class', 'picker');

		foreach($this->drama->get_acts() as $act)
		{
			$url = Oedipus_DramaHelper
				::get_drama_page_url_for_act_id($act->get_id());
			$li = new HTMLTags_LI();
			$a = new HTMLTags_A($act->get_name());
			$a->set_href($url);
			if ($current_act->get_id() == $act->get_id())
			{
				$a->set_attribute_str('id', 'selected');
			}
			$li->append($a);
			$ul->append($li);
		}

		/*
		 * Add Act LI
		 */
		$ul->append(
			$this->get_add_act_li()
		);

		return $ul;
	}

	protected function
		get_add_act_li()
	{
		$li = new HTMLTags_LI();
		$a = new HTMLTags_A('Add Act');
		$a->set_attribute_str('id', 'add');
		$a->set_attribute_str('title', 'Add an Act');
		$a->set_href(
			Oedipus_DramaHelper
			::get_add_act_url(
				$this->drama->get_id()
			)
		);
		$li->append($a);

		return $li;
	}

	protected function
		get_scene_div(Oedipus_Act $act, Oedipus_Scene $scene)
	{
		if ($this->drama->is_editable())
		{
			$scene->make_editable();
		}
	
		if (isset($_GET['frame_id']))
		{
			return new Oedipus_FrameViewSceneDiv($act, $scene, $_GET['frame_id']);
		}
		return new Oedipus_TreeViewSceneDiv($act, $scene);
	}

	protected function
		get_new_drama_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaPage');
	}
}
?>
