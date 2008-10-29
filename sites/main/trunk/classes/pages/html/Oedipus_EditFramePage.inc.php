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
Oedipus_HTMLPage
{
	private $frame;

	public function
		content()
	{
		if (isset($_GET['frame_id']))
		{
			//                        print_r($_GET);exit;
			$this->frame = Oedipus_DramaHelper
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
					'frame-editor', 'title'
				);
			DBPages_PageRenderer
				::render_page_section(
					'frame-editor', 'no-frame-set'
				);
		}
	}

	private function
		get_edit_frame_page_div()
	{
		$frame_editor_page_div = new HTMLTags_Div();
		$frame_editor_page_div->set_attribute_str(
			'class', 'frame-editor'
		);

		# The Actions UL (Edit, Share...)
		$this->wrap_element_with_class_and_add_to_div(
			$frame_editor_page_div,
			$this->get_oedipus_html_frame_editor_page_actions_ul(),
			'frame-editor-page-actions'
		);

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

	private function
		get_oedipus_frame_editor_forms_div()
	{
		$frame_editor_forms_div = new HTMLTags_Div();
		$frame_editor_forms_div->set_attribute_str('class', 'frame-editor-forms');

		//frame Name form
		$this->wrap_element_with_class_and_add_to_div(
			$frame_editor_forms_div,
			$this->get_oedipus_html_frame_name_editor_form(),
			'frame-editor-form'
		);

		//frame actions UL
		$this->wrap_element_with_class_and_add_to_div(
			$frame_editor_forms_div,
			$this->get_oedipus_html_frame_editor_actions_ul(),
			'frame-editor-actions'
		);

		foreach ($this->frame->get_characters() as $character)
		{
			$character_css_id = $character->get_color();

			//character form
			$this->wrap_element_with_class_and_id_and_add_to_div(
				$frame_editor_forms_div,
				$this->get_oedipus_html_character_editor_form($character),
				'character-editor',
				$character_css_id
			);
			//character actions UL
			$this->wrap_element_with_class_and_id_and_add_to_div(
				$frame_editor_forms_div,
				$this->get_oedipus_html_character_actions_ul($character),
				'character-editor-actions',
				$character_css_id
			);

			$i = 1;
			foreach ($character->get_options() as $option)
			{
				//Option form
				$this->wrap_element_with_class_and_id_and_add_to_div(
					$frame_editor_forms_div,
					$this->get_oedipus_html_option_editor_form($option, $i),
					'option-editor',
					$character_css_id
				);
				//Option actions UL
				$this->wrap_element_with_class_and_id_and_add_to_div(
					$frame_editor_forms_div,
					$this->get_oedipus_html_option_actions_ul($option),
					'option-editor-actions',
					$character_css_id
				);
				$i++;
			}

		}
		return $frame_editor_forms_div;
	}

	###########
	# Silly functions to add classes to divs
	# for the CSS rules
	#
	private function
		wrap_element_with_class_and_add_to_div(
			$div, $content, $class_name
		)
	{
		$div->append_tag_to_content(
			$this->wrap_in_div_with_class(
				$content,
				$class_name
			)
		);
	}

	private function
		wrap_element_with_class_and_id_and_add_to_div(
			$div, $content, $class_name, $id_name
		)
	{
		$div->append_tag_to_content(
			$this->wrap_in_div_with_class_and_id(
				$content,
				$class_name,
				$id_name
			)
		);
	}

	private function
		wrap_in_div_with_class($content, $class_name)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', $class_name);
		$div->append_tag_to_content($content);
		return $div;
	}

	private function
		wrap_in_div_with_class_and_id(
			$content, $class_name, $id_name
		)
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', $class_name);
		$div->set_attribute_str('id', $id_name);
		$div->append_tag_to_content($content);
		return $div;
	}
	#
	#
	###############

	/*
	 * Functions to call in the html-tags
	 * classes for the page elements
	 *
	 */
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
			'class', 'frame-editor-instructions'
		);

		$db_page = DBPages_SPoE::get_filtered_page_section(
			'frame-editor', 'instructions'
		);
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

	private function
		get_oedipus_html_frame_name_editor_form()
	{
		return new Oedipus_EditFrameNameHTMLForm($this->frame);
	}

	private function
		get_oedipus_html_frame_editor_actions_ul()
	{
		return new Oedipus_EditFrameFrameActionsUL($this->frame);
	}

	private function
		get_oedipus_html_character_editor_form(
			Oedipus_Character $character
		)
	{
		return new Oedipus_EditCharacterHTMLForm(
			$this->frame, $character
		);
	}

	private function
		get_oedipus_html_character_actions_ul(
			Oedipus_Character $character
		)
	{
		return new Oedipus_EditFrameCharacterActionsUL(
			$this->frame, $character
		);
	}

	private function
		get_oedipus_html_option_editor_form(
			Oedipus_Option $option, $iteration
		)
	{
		return new Oedipus_EditOptionHTMLForm(
			$this->frame, $option, $iteration
		);
	}

	private function
		get_oedipus_html_option_actions_ul(Oedipus_Option $option)
	{
		return new Oedipus_EditFrameOptionActionsUL(
			$this->frame, $option
		);
	}

	private function
		get_oedipus_html_frame_editor_page_actions_ul()
	{
		return new Oedipus_EditFramePageActionsUL(
			$this->frame
		);
	}
}
?>
