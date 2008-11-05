<?php
/**
 * Oedipus_FrameDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * FrameView div
 *
 */

class
	Oedipus_FrameDiv
extends
	HTMLTags_Div
{
	private $frame;
	
	public function
		__construct(Oedipus_Frame $frame)
	{
//                print_r($frame);exit;
		parent::__construct();
		$this->frame = $frame;

		# The left and right column divs
		$left_div = new HTMLTags_Div();
		$left_div->set_attribute_str('class', 'left-column');

		# The frame itself
		$left_div->append_tag_to_content(
			$this->get_oedipus_frame_div()
		);

		# The instructions
		//$left_div->append_tag_to_content(
		//	$this->get_drama_page_frame_instructions_div()
		//);

		$this->append_tag_to_content($left_div);

		$right_div = new HTMLTags_Div();
		$right_div->set_attribute_str('class', 'right-column');

		# The notes etc. added here
		$right_div->append_tag_to_content($this->get_frame_notes_div());

		$this->append_tag_to_content($right_div);

		$clear_div = new HTMLTags_Div();
		$clear_div->set_attribute_str('class', 'clear-columns');
		$this->append_tag_to_content($clear_div);
	}

	private function
		get_oedipus_frame_div()
	{
		$frame_div = new HTMLTags_Div();
		$frame_div->set_attribute_str('class', 'oedipus-frame');

		$frame_div->append_tag_to_content($this->get_oedipus_html_frame());
		//$frame_div->append_tag_to_content($this->get_oedipus_png_frame($frame));

		$frame_div->append_tag_to_content(
			$this->get_oedipus_html_frame_options()
		);

		return $frame_div;
	}
	private function
		get_oedipus_html_frame()
	{
		//                print_r($frame);exit;
		# Get a frame that's not editable
		return new Oedipus_FrameHTMLTable($this->frame, FALSE);
	}

	private function
		get_drama_page_frame_instructions_div()
	{
		$instructions_div = new HTMLTags_Div();
		$instructions_div->set_attribute_str('class', 'instructions');
		$instructions_div->set_attribute_str('id', 'drama-page-frame');

		$db_page = DBPages_SPoE
			::get_filtered_page_section('drama', 'frame-instructions');
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

	private function
		get_oedipus_html_frame_options()
	{
		return new Oedipus_FrameOptionsUL($this->frame, $editable);
	}

	private function
		get_frame_notes_div()
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'notes');

		$heading = new HTMLTags_Heading(3, $this->frame->get_name());

		//print_r($frame);exit;
		$div->append_tag_to_content($heading);

		try
		{
			if ($this->frame->is_editable()) {

				$drama_id = $this->frame->get_drama_id();

				if (Oedipus_NotesHelper::has_frame_got_note($this->frame->get_id()))
				{
					$note = Oedipus_NotesHelper
						::get_note_by_frame_id($this->frame->get_id());
					$div->append(
						new Oedipus_EditFrameNoteHTMLForm(
							$note, $drama_id, $this->frame->get_id()
						)
					);
				}
				else {
					$div->append(
						new Oedipus_AddFrameNoteHTMLForm($drama_id, $this->frame)
					);
				}
			}
			else {
				$note = Oedipus_NotesHelper::get_note_by_frame_id($this->frame->get_id());
				//print_r($note);exit;
				$div->append_tag_to_content($note->get_note_text_in_pre());
			}
		}
		catch (Exception $e)
		{
			throw new Exception('Failed to retrieve note');
		}


		return $div;
	}


}
?>
