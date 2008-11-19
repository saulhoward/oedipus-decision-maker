<?php
/**
 * Oedipus_DramasUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
Oedipus_DramasUL
extends
HTMLTags_UL
{
	public function
		__construct()
	{
		parent::__construct();

		$dramas = $this->get_dramas();

		$this->set_attribute_str('class', 'dramas');

		foreach ($dramas as $drama)
		{
			$drama_li = $this->get_drama_li($drama);
			$this->append_tag_to_content($drama_li);
		}
	}

	protected function
		get_dramas()
	{
		return Oedipus_DramaHelper::get_latest_public_dramas();
	}

	private function
		get_drama_li(Oedipus_Drama $drama)
	{
		$drama_url = $this->get_drama_page_url_for_drama($drama);
		$link = new HTMLTags_A();

		/*
		 * Put the Link, image, added date etc.
		 * in separate <span></span>
		 */
		$name_span = $this->get_span_with_id($drama->get_name(), 'name');
		$added_span = $this->get_span_with_id($drama->get_human_readable_added(), 'added');

		$link->append_tag_to_content($name_span);
		$link->append_tag_to_content($added_span);

		$link->set_href($drama_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'drama');

//                foreach ($drama->get_frames() as $frame)
//                {
//                        $li->append_tag_to_content($this->get_oedipus_png_frame($frame));
//                }

		return $li;
	}

	private function
		get_span_with_id($content_str, $id_name)
	{
		$span = new HTMLTags_Span($content_str);
		$span->set_attribute_str('id', $id_name);
		return $span;
	}

	private function
		get_drama_page_url_for_drama(Oedipus_Drama $drama)
	{
		return Oedipus_DramaHelper::get_drama_page_url_for_drama($drama);
	}
}
?>
