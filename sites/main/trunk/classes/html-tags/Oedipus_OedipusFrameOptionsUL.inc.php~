<?php
/**
 * Oedipus_OedipusFrameOptionsUL
 *
 *  2008-03-17, RFI
 *  2008-04-05, SANH
 */

class
	Oedipus_OedipusFrameOptionsUL
extends
	HTMLTags_UL
{
	private $frame;

	public function
		__construct(Oedipus_Frame $frame, $edit_frame_option = TRUE)
	{
		parent::__construct();

		$this->frame = $frame;
		
		$this->set_attribute_str('class', 'frame-options');

		if ($edit_frame_option)
		{
			// Link to edit the frame
			$edit_li = $this->get_edit_li();
			$this->append_tag_to_content($edit_li);
		}
		
		// Link to png_image the frame
		$png_image_li = $this->get_png_image_li();
		$this->append_tag_to_content($png_image_li);
	}

	private function
		get_png_image_li()
	{
		$png_image_url = $this->get_png_image_url();
		$link = new HTMLTags_A('PNG image of this frame');
		$link->set_href($png_image_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'png-image-frame');

		return $li;
	}

	private function
		get_png_image_url()
	{
		//                $get_variables = array("frame_id" => $this->frame->get_id());
		//                return PublicHTML_URLHelper
		//                        ::get_oo_page_url('Oedipus_framePNGImage', $get_variables);

		// Nice URLs /frames/images/option-frame-XX.png
		return Oedipus_frameImageHelper::get_frame_png_url($this->frame->get_id());
	}

	private function
		get_edit_li()
	{
		$edit_url = $this->get_edit_url();
		$link = new HTMLTags_A('Edit this frame');
		$link->set_href($edit_url);
		$li = new HTMLTags_LI();
		$li->append_tag_to_content($link);
		$li->set_attribute_str('id', 'edit-frame');

		return $li;
	}

	private function
		get_edit_url()
	{
		$get_variables = array("frame_id" => $this->frame->get_id());

		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_EditFramePage', $get_variables);
	}
}
?>
