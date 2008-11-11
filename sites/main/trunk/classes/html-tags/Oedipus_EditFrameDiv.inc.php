<?php
/**
 * Oedipus_EditFrameDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Main EditFrameDiv
 *
 */

class
	Oedipus_EditFrameDiv
extends
	HTMLTags_Div
{
	protected $frame;

	public function
		__construct(Oedipus_Frame $frame)
	{
		if (!$frame->is_editable()) {
			throw new Exception('This frame is locked.');
		}
		parent::__construct();

		$this->frame = $frame;

		$this->set_attribute_str(
			'class', 'edit-frame'
		);

		//$this->append_tag_to_content(
			//$this->get_frame_editor_heading()
		//);

		# The left and right column divs
		$left_div = new HTMLTags_Div();
		$left_div->set_attribute_str('class', 'left-column');

		# The frame itself
		$left_div->append_tag_to_content($this->get_oedipus_frame_div());

		# The instructions
		$left_div->append_tag_to_content($this->get_frame_editor_instructions_div());

		$this->append_tag_to_content($left_div);

		$right_div = new HTMLTags_Div();
		$right_div->set_attribute_str('class', 'right-column');

		# The forms to edit names, add characters and options
		#
		$right_div->append($this->get_oedipus_frame_editor_forms_div());
		$this->append_tag_to_content($right_div);
	}

	private function
		get_oedipus_frame_editor_forms_div()
	{
		return Oedipus_FrameHelper::get_edit_frame_forms_div($this->frame);
	}

	private function
		get_frame_editor_heading()
	{
		$heading = new HTMLTags_Heading(2);
		$span = new HTMLTags_Span('Editing Frame:&nbsp;');
		$span->set_attribute_str('class', 'edit-text');
		$heading->append_tag_to_content($span);
		$heading->append_str_to_content($this->frame->get_name());
		return $heading;
	}

	private function
		get_oedipus_frame_div()
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'oedipus-frame');
		$div->append_tag_to_content(
			new Oedipus_FrameHTMLTable($this->frame)
		);
		return $div;
	}

	private function
		get_frame_editor_instructions_div()
	{
		$instructions_div = new HTMLTags_Div();
		$instructions_div->set_attribute_str(
			'class', 'edit-frame-instructions'
		);

		$db_page = DBPages_SPoE::get_filtered_page_section(
			'edit-frame', 'instructions'
		);
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

}
?>
