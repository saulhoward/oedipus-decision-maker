<?php
/**
 * Oedipus_DramaDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 * @copyright 2008-11-11, SANH
 */

/**
 * Main Drama Div used on the Oedipus_DramaPage
 *
 * Shows the drama name, toolbars, tree view, 
 * frame view, edit frame view
 *
 */

class
Oedipus_DramaDiv
extends
HTMLTags_Div
{
	protected $drama;

	protected function
		get_drama()
	{
		return $this->drama;
	}

	protected function
		set_drama(Oedipus_Drama $drama)
	{
		$this->drama = $drama;
	}

	public function
		__construct(Oedipus_Drama $drama)
	{
		parent::__construct();

		$this->set_drama($drama);

		$this->set_attribute_str('class', 'drama');

		//$this->append_tag_to_content(
			//$this->get_drama_heading($drama)
		//);

		if (isset($_GET['return_message'])) {
			//print_r($_GET);exit;
			$this->append(
				$this->get_message_div($_GET['return_message'])
			);
		}

		$this->append(
			$this->get_content_div()
		);
	}

	protected function
		get_content_div()
	{
		$div = new HTMLTags_Div();
		/*
		 * Get the act id
		 */
		if (isset($_GET['act_id'])) {
			$act_id = $_GET['act_id'];	
		}
		elseif (isset($_GET['scene_id'])) {
			$act_id = Oedipus_DramaHelper
				::get_act_id_for_scene_id(
					$_GET['scene_id']
				);
		}
		elseif (isset($_GET['frame_id'])) {
			$act_id = Oedipus_DramaHelper
				::get_act_id_for_frame_id(
					$_GET['frame_id']
				);
		}
		else {
			$act_id = Oedipus_DramaHelper
				::get_first_act_id_for_drama_id(
					$this->get_drama()->get_id()
				);
		}

		/*
		 *Get the Act
		 */
		$act = $this->get_drama()->get_act($act_id);
		if ($this->get_drama()->is_editable()) {
			$act->make_editable();
		}
		/*
		 *Get the Act Div
		 */
		$div->append(
			$this->get_act_div(
				$act
			)
		);
		return $div;
	}

	protected function
		get_drama_heading()
	{
		return new HTMLTags_Heading(2, $this->get_drama()->get_name());
	}

	protected function
		get_message_div($msg)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('id', 'message');
		$p = new HTMLTags_P();
		$p->append($msg);
		$div->append($p);
		return $div;
	}

	protected function
		get_act_div(Oedipus_Act $act)
	{
		$act_div = new HTMLTags_Div();
		$act_div->set_attribute_str('class', 'act');
		/*
		 * Show the Drama Toolbar with act 
		 * list and share links
		 */
		$act_div->append(
			new Oedipus_DramaToolBarUL(
				$this->get_drama(), $act->get_id()
			)
		);

		/*
		 * Get the Scene ID
		 */
		if (isset($_GET['scene_id'])) {
			$scene_id = $_GET['scene_id'];	
		}
		elseif (isset($_GET['frame_id'])) {
			$scene_id = Oedipus_DramaHelper
				::get_scene_id_for_frame_id(
					$_GET['frame_id']
				);
		}
		else {
			$scene_id = Oedipus_DramaHelper
				::get_first_scene_id_for_act_id(
					$act->get_id()
				);
		}

		/*
		 *Show the Act Toolbar with scene list
		 */
		$act_div->append(
			new Oedipus_ActToolBarUL(
				$act, $scene_id
			)
		);

		/*
		 *Get the Scene Div
		 */
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
		/*
		 *Pass Editing Priviliges
		 */
		if ($this->get_drama()->is_editable()) {
			$scene->make_editable();
		}

		if (isset($_GET['frame_id'])) {
			/*
			 * Return the normal frame
			 */
			return new Oedipus_FrameViewSceneDiv(
				$scene,
				$_GET['frame_id']
			);
		}
		/*
		 * Return the Tree
		 */
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
