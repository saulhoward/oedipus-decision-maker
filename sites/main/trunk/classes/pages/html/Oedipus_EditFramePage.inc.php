<?php
/**
 * Oedipus_EditFramePage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 */

class
Oedipus_EditFramePage
extends
Oedipus_RestrictedPage
{
	private $frame;

	public function
		content()
	{
		if (isset($_GET['frame_id']))
		{
			//print_r($_GET);exit;
			$this->frame = Oedipus_FrameHelper
				::get_frame_by_id(
					$_GET['frame_id']
				);

			$frame_editor_page_div 
				= $this->get_edit_frame_page_div();

			echo $frame_editor_page_div->get_as_string();
		}
		else
		{
			// NO frame SET
			DBPages_PageRenderer
				::render_page_section(
					'edit-frame', 'title'
				);
			DBPages_PageRenderer
				::render_page_section(
					'edit-frame', 'no-frame-set'
				);
		}
	}

	private function
		get_edit_frame_page_div()
	{
		$frame_editor_page_div = new HTMLTags_Div();
		$frame_editor_page_div->set_attribute_str(
			'class', 'edit-frame'
		);

		$frame_editor_page_div->append($this->get_page_actions_ul());

		$frame_editor_page_div->append_tag_to_content(
			$this->get_frame_editor_heading()
		);

		if (isset($this->frame))
		{
			# The left and right column divs
			$left_div = new HTMLTags_Div();
			$left_div->set_attribute_str('class', 'left-column');

			# The frame itself
			$left_div->append_tag_to_content($this->get_oedipus_frame_div());

			# The instructions
			$left_div->append_tag_to_content($this->get_frame_editor_instructions_div());

			$frame_editor_page_div->append_tag_to_content($left_div);

			$right_div = new HTMLTags_Div();
			$right_div->set_attribute_str('class', 'right-column');

			# The forms to edit names, add characters and options
			$right_div->append_tag_to_content(
				$this->get_oedipus_frame_editor_forms_div()
			);

			$frame_editor_page_div->append_tag_to_content($right_div);
		}

		return $frame_editor_page_div;
	}

	/*
	 * Functions to call in the html-tags
	 * classes for the page elements
	 *
	 */

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
	private function
		get_page_actions_ul()
	{
		return new Oedipus_EditFramePageActionsUL(
			$this->frame
		);
	}
}
?>
