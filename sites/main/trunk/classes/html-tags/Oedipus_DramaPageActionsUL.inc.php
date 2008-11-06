<?php
/**
 * Oedipus_DramaPageActionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-04-27, SANH
 */

class
Oedipus_DramaPageActionsUL
extends
Oedipus_PageActionsUL
{
	private $drama;

	public function
		__construct(Oedipus_Drama $drama)
	{
		parent::__construct();

		$this->drama = $drama;

		$tree_view_li = $this->get_tree_view_li();
		$this->append_tag_to_content($tree_view_li);

		$frame_view_li = $this->get_frame_view_li();
		$this->append_tag_to_content($frame_view_li);

		// Link to share drama
//                $share_drama_li = $this->get_share_drama_li();
//                $this->append_tag_to_content($share_drama_li);
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
			::get_frame_view_drama_page_url_for_drama_id($this->drama->get_id());
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
		return Oedipus_DramaHelper::get_drama_page_url_for_drama_id($this->drama->get_id());
	}

	private function
		get_share_drama_li()
	{
		$share_drama_url = $this->get_share_drama_url();
		$link = new HTMLTags_A('Share this Drama');
		$link->set_href($share_drama_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'share-drama');

		return $li;
	}

	private function
		get_share_drama_url()
	{
		$get_variables = array("drama_id" => $this->drama->get_id());

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_ShareDramaPage', $get_variables);
	}
}
?>
