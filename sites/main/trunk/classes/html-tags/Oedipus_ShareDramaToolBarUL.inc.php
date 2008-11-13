<?php
/**
 * Oedipus_ShareDramaToolBarUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 *  2008-11-11, SANH
 */

/*
 *Toolbar for the DramaDiv
 *Shows acts and share this links
 */
class
Oedipus_ShareDramaToolBarUL
extends
Oedipus_ToolBarUL
{
	private $drama;

	public function
		__construct(Oedipus_Drama $drama)
	{
		parent::__construct();

		$this->drama = $drama;
		/*
		  *Link to view drama
                  */
		$this->append(
			$this->get_view_drama_li()
		);

                 /*
		  *Link to share drama
                  */
		$this->append(
			$this->get_share_drama_li()
		);
	}

	private function
		get_view_drama_li()
	{
		$view_drama_url = $this->get_view_drama_url();
		$link = new HTMLTags_A('View this Drama');
		$link->set_href($view_drama_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'view-drama');

		return $li;
	}

	private function
		get_view_drama_url()
	{
		return Oedipus_DramaHelper::get_drama_page_url($this->drama);
	}

	private function
		get_share_drama_li()
	{
		$share_drama_url = $this->get_share_drama_url();
		$link = new HTMLTags_A('Share this Drama');
		$link->set_href($share_drama_url);
		$link->set_attribute_str('id', 'selected');
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
