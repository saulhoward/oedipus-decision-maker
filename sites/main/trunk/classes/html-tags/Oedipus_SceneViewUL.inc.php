<?php
/**
 * Oedipus_SceneViewUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-04-27, SANH
 */

class
Oedipus_SceneViewUL
extends
HTMLTags_UL
{
	private $scene;

	public function
		__construct(Oedipus_Scene $scene)
	{
		parent::__construct();

		$this->set_attribute_str('class', 'scene-view');
		$this->scene = $scene;

		$this->append_tag_to_content(
			$this->get_tree_view_li()
		);
		$this->append_tag_to_content(
			$this->get_frame_view_li()
		);
	}

	private function
		get_frame_view_li()
	{
		$frame_view_url = $this->get_frame_view_url();
		$link = new HTMLTags_A('Frame View');
		$link->set_href($frame_view_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'frame-view');

		return $li;
	}

	private function
		get_frame_view_url()
	{
		return Oedipus_DramaHelper
			::get_frame_view_drama_page_url_for_scene_id(
				$this->scene->get_id()
			);
	}

	private function
		get_tree_view_li()
	{
		$tree_view_url = $this->get_tree_view_url();
		$link = new HTMLTags_A('Tree View');
		$link->set_href($tree_view_url);
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
			$this->scene->get_id()
		);
	}
}
?>
