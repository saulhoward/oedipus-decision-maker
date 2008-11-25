<?php
/**
 * Oedipus_ActToolBarUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-04-27, SANH
 */

class
Oedipus_ActToolBarUL
extends
Oedipus_ToolBarUL
{
	private $act;
	private $scene_id;

	public function
		__construct(Oedipus_Act $act, $scene_id)
	{
		parent::__construct();
		$this->set_attribute_str('id', 'act');

		$this->act = $act;
		$this->scene_id = $scene_id;

		foreach($this->act->get_scenes() as $scene)
		{
			$url = Oedipus_DramaHelper
				::get_drama_page_url_for_scene_id($scene->get_id());
			$li = new HTMLTags_LI();
			$a = new HTMLTags_A($scene->get_name());
			$a->set_href($url);
			if ($this->scene_id == $scene->get_id())
			{
				$a->set_attribute_str('id', 'selected');
			}
			$li->append($a);
			$this->append($li);
		}

		/**
		 * Add scene LI
		 *
		 */
		if (
			($this->act->is_editable())
		) {
			$this->append(
				$this->get_add_scene_li()
			);
		}
		$this->append_tag_to_content(
			$this->get_tree_view_li()
		);
		$this->append_tag_to_content(
			$this->get_frame_view_li()
		);
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

	private function
		get_frame_view_li()
	{
		$frame_view_url = $this->get_frame_view_url();
		$link = new HTMLTags_A('Frame View');
		$link->set_href($frame_view_url);
		if (
			isset($_GET['frame_id'])
		) {
			$link->set_attribute_str('id', 'selected');
		}
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'frame-view');

		return $li;
	}

	private function
		get_frame_view_url()
	{
		if (
			isset($_GET['frame_id'])
		) {
			return Oedipus_DramaHelper
				::get_drama_page_url_for_frame_id(
					$_GET['frame_id']
				);
		}
		return Oedipus_DramaHelper
			::get_frame_view_drama_page_url_for_scene_id(
				$this->scene_id
			);
	}

	private function
		get_tree_view_li()
	{
		$tree_view_url = $this->get_tree_view_url();
		$link = new HTMLTags_A('Scene View');
		$link->set_href($tree_view_url);
		if (
			!isset($_GET['frame_id'])
		)
		{
			$link->set_attribute_str('id', 'selected');
		}
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'tree-view');

		return $li;
	}

	private function
		get_tree_view_url()
	{
		return Oedipus_DramaHelper
			::get_drama_page_url_for_scene_id(
			$this->scene_id
		);
	}
}
?>
