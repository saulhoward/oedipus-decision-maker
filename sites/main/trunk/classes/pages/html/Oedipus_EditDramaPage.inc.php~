<?php
/**
 * Oedipus_EditDramaPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-10-28, SANH
 */

class
	Oedipus_EditDramaPage
extends
	Oedipus_HTMLPage
{
	private $drama;
	
	public function 
		get_drama()
	{
		return $this->drama;
	}

	public function 
		set_drama(
			Oedipus_Drama $drama
		)
	{
		$this->drama = $drama;
	}
	
	public function
		has_drama()
	{
		return isset($this->drama);
	}
	
	public function
		content()
	{
		if (isset($_GET['drama_unique_name'])) {
			try {
				$this->set_drama(
					Oedipus_DramaHelper
						::get_drama_by_unique_name(
							$_GET['drama_unique_name']
						)
				);

				//                        print_r($_GET);exit;
			} catch (Exception $e) {
				/*
				 * See
				 * http://code.google.com/p/oedipus-decision-maker/issues/detail?id=7
				 * RFI 2008-04-29
				 */
			}
		} 
		elseif (isset($_GET['drama_id']))
		{
			try
			{
				$this->set_drama(
					Oedipus_DramaHelper
					::get_drama_by_id(
						$_GET['drama_id']
					)
				);
			}
			catch (Exception $e)
			{

			}
		}

		if ($this->has_drama()) {
			/*
			 * Show the frames of the drama.
			 */
			$drama_editor_page_div =
				$this->get_oedipus_drama_editor_page_div();
		}
		else
		{
			// NO DRAMA SET
			DBPages_PageRenderer::render_page_section('drama-editor', 'title');
			DBPages_PageRenderer::render_page_section('drama-editor', 'no-drama-set');

			$drama_editor_page_div = new HTMLTags_Div();
			$drama_editor_page_div->append_tag_to_content(
				$this->get_all_dramas_ul()
			);
			
			$drama_editor_page_div->append_tag_to_content(
				$this->get_create_new_drama_div()
			);
		}
		
		echo $drama_editor_page_div->get_as_string();
	}

	private function
		get_oedipus_drama_editor_page_div()
	{
		$drama_editor_page_div = new HTMLTags_Div();
		$drama_editor_page_div->set_attribute_str('class', 'drama-editor');

		$drama_editor_page_div->append_tag_to_content(
			$this->get_oedipus_html_drama_editor_page_actions_ul()
		);

		if ($this->has_drama())
		{
			$drama_editor_page_div->append_tag_to_content(
				$this->get_drama_heading()
			);

                       $drama_editor_page_div->append_tag_to_content(
                               $this->get_drama_div()
                       );
		}

		return $drama_editor_page_div;
	}

	private function
		get_drama_div()
	{
		$editable = TRUE;
		return Oedipus_DramaHelper::get_drama_div($this->get_drama(), $editable);
	}

/*
 *        private function
 *                get_oedipus_html_drama_div()
 *        {
 *                $drama_div = new HTMLTags_Div();
 *                $drama_div->set_attribute_str('class', 'oedipus-drama');
 *
 *                // SHOW THE frameS
 *                foreach ($this->drama->get_frames() as $frame)
 *                {
 *                
 *                        # The left and right column divs
 *                        $left_div = new HTMLTags_Div();
 *                        $left_div->set_attribute_str('class', 'left-column');
 *
 *                        # The frame itself
 *                        $left_div->append_tag_to_content($this->get_oedipus_frame_div($frame));
 *                        # The instructions
 *                        //$left_div->append_tag_to_content($this->get_drama_page_frame_instructions_div());
 *                        $drama_div->append_tag_to_content($left_div);
 *
 *                        $right_div = new HTMLTags_Div();
 *                        $right_div->set_attribute_str('class', 'right-column');
 *                        # The notes etc. added here
 *                        $right_div->append_tag_to_content($this->get_frame_notes_div($frame));
 *
 *                        $drama_div->append_tag_to_content($right_div);
 *
 *                        $clear_div = new HTMLTags_Div();
 *                        $clear_div->set_attribute_str('class', 'clear-columns');
 *                        $drama_div->append_tag_to_content($clear_div);
 *                }
 *
 *                // CREATE frame FORM
 *                $drama_div->append_tag_to_content($this->get_add_frame_form());
 *
 *                return $drama_div;
 *        }
 */

	/*
	 * Functions to call in the html-tags
	 * classes for the page elements
	 *
	 */
	private function
		get_drama_heading()
	{
		$heading = new HTMLTags_Heading(2);
		$span = new HTMLTags_Span('Editing:&nbsp;');
		$span->set_attribute_str('class', 'edit-text');
		$heading->append_tag_to_content($span);
		$heading->append_str_to_content($this->drama->get_name());
		return $heading;
	}

	private function
		get_oedipus_frame_div(Oedipus_frame $frame)
	{
		$frame_div = new HTMLTags_Div();
		$frame_div->set_attribute_str('class', 'oedipus-frame');
		$frame_div->append_tag_to_content($this->get_oedipus_html_frame($frame));
		$frame_div->append_tag_to_content($this->get_oedipus_html_frame_options($frame));
		return $frame_div;
	}

	private function
		get_oedipus_html_frame(Oedipus_frame $frame)
	{
		return new Oedipus_FrameHTMLTable($frame, FALSE);
	}

	private function
		get_oedipus_html_frame_options(Oedipus_frame $frame)
	{
		return new Oedipus_FrameOptionsUL($frame);
	}

	private function
		get_frame_notes_div(Oedipus_frame $frame)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'notes');

		$heading = new HTMLTags_Heading(3, $frame->get_name());
		$div->append_tag_to_content($heading);

		$div->append_tag_to_content($this->get_frame_notes_form($frame));

		return $div;
	}

	private function
		get_frame_notes_form(Oedipus_frame $frame)
	{
		if (Oedipus_NotesHelper::has_frame_got_note($frame->get_id()))
		{
			$note = Oedipus_NotesHelper::get_note_by_frame_id($frame->get_id());
			return new Oedipus_EditFrameNoteHTMLForm($note, $this->drama);
		}
		else
		{
			return new Oedipus_AddFrameNoteHTMLForm($this->drama, $frame);
		}
	}

	private function
		get_oedipus_html_drama_editor_page_actions_ul()
	{
		return new Oedipus_EditDramaPageActionsUL($this->drama);
	}

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_AllDramasUL();
	}

	private function
		get_add_drama_form()
	{
		return new Oedipus_AddDramaHTMLForm();
	}

	private function
		get_create_new_drama_div()
	{
		$form_div = new HTMLTags_Div();
		$form_div->set_attribute_str('class', 'add-drama-form');
		$html_form = $this->get_add_drama_form();
		$form_div->append_tag_to_content($html_form);
		return $form_div;
	}

	private function
		get_add_frame_form()
	{
		return new Oedipus_AddframeHTMLForm($this->drama);
	}
}
?>
