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

		$act_div->append(
			new Oedipus_DramaToolBarUL(
				$this->drama, $act->get_id()
			)
		);


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
			new Oedipus_ActToolBarUL(
				$act, $scene_id
			)
		);
		$act_div->append(
			$this->get_scene_div(
				$act->get_scene($scene_id)
			)
		);
		return $act_div;
	}


	protected function
		get_scene_div(Oedipus_Scene $scene)
	{
		if ($this->drama->is_editable())
		{
			$scene->make_editable();
		}

		if (
			isset($_GET['edit_frame'])
			&&
			isset($_GET['frame_id'])
		)
		{
			return new Oedipus_EditFrameSceneDiv($scene, $_GET['frame_id']);
		}
		elseif (isset($_GET['frame_id']))
		{
			return new Oedipus_FrameViewSceneDiv($scene, $_GET['frame_id']);
		}
		return new Oedipus_TreeViewSceneDiv($scene);
	}

	protected function
		get_new_drama_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaPage');
	}
}
?>
