<?php
/**
 * Oedipus_TableEditorPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 */

class
Oedipus_TableEditorPage
extends
Oedipus_HTMLPage
{
	private $table;

	public function
		content()
	{
		if (isset($_GET['table_id']))
		{
			//                        print_r($_GET);exit;
			$this->table = Oedipus_TableCreationHelper::get_oedipus_table_by_id($_GET['table_id']);
			$table_editor_page_div = $this->get_oedipus_table_editor_page_div();

			echo $table_editor_page_div->get_as_string();
		}
		else
		{
			// NO TABLE SET
			DBPages_PageRenderer::render_page_section('table-editor', 'title');
			DBPages_PageRenderer::render_page_section('table-editor', 'no-table-set');
		}
	}

	private function
		get_oedipus_table_editor_page_div()
	{
		$table_editor_page_div = new HTMLTags_Div();
		$table_editor_page_div->set_attribute_str('class', 'table-editor');

		# The Actions UL (Edit, Share...)
		$this->wrap_element_with_class_and_add_to_div(
			$table_editor_page_div,
			$this->get_oedipus_html_table_editor_page_actions_ul(),
			'table-editor-page-actions'
		);

		$table_editor_page_div->append_tag_to_content(
			$this->get_table_editor_heading()
		);

		if (isset($this->table))
		{
			# The left and right column divs
			$left_div = new HTMLTags_Div();
			$left_div->set_attribute_str('class', 'left-column');

			# The table itself
			$left_div->append_tag_to_content($this->get_oedipus_table_div());
			# The instructions
			$left_div->append_tag_to_content($this->get_table_editor_instructions_div());

			$table_editor_page_div->append_tag_to_content($left_div);

			$right_div = new HTMLTags_Div();
			$right_div->set_attribute_str('class', 'right-column');

			# The forms to edit names, add actors and options
			$right_div->append_tag_to_content(
				$this->get_oedipus_table_editor_forms_div()
			);

			$table_editor_page_div->append_tag_to_content($right_div);
		}

		return $table_editor_page_div;
	}

	private function
		get_oedipus_table_editor_forms_div()
	{
		$table_editor_forms_div = new HTMLTags_Div();
		$table_editor_forms_div->set_attribute_str('class', 'table-editor-forms');

		//Table Name form
		$this->wrap_element_with_class_and_add_to_div(
			$table_editor_forms_div,
			$this->get_oedipus_html_table_name_editor_form(),
			'table-editor-form'
		);

		//Table actions UL
		$this->wrap_element_with_class_and_add_to_div(
			$table_editor_forms_div,
			$this->get_oedipus_html_table_editor_actions_ul(),
			'table-editor-actions'
		);

		foreach ($this->table->get_actors() as $actor)
		{
			$actor_css_id = $actor->get_color();

			//Actor form
			$this->wrap_element_with_class_and_id_and_add_to_div(
				$table_editor_forms_div,
				$this->get_oedipus_html_actor_editor_form($actor),
				'actor-editor',
				$actor_css_id
			);
			//Actor actions UL
			$this->wrap_element_with_class_and_id_and_add_to_div(
				$table_editor_forms_div,
				$this->get_oedipus_html_actor_actions_ul($actor),
				'actor-editor-actions',
				$actor_css_id
			);

			$i = 1;
			foreach ($actor->get_options() as $option)
			{
				//Option form
				$this->wrap_element_with_class_and_id_and_add_to_div(
					$table_editor_forms_div,
					$this->get_oedipus_html_option_editor_form($option, $i),
					'option-editor',
					$actor_css_id
				);
				//Option actions UL
				$this->wrap_element_with_class_and_id_and_add_to_div(
					$table_editor_forms_div,
					$this->get_oedipus_html_option_actions_ul($option),
					'option-editor-actions',
					$actor_css_id
				);
				$i++;
			}

		}
		return $table_editor_forms_div;
	}

	###########
	# Silly functions to add classes to divs
	# for the CSS rules
	#
	private function
		wrap_element_with_class_and_add_to_div($div, $content, $class_name)
	{
		$div->append_tag_to_content(
			$this->wrap_in_div_with_class(
				$content,
				$class_name
			)
		);
	}

	private function
		wrap_element_with_class_and_id_and_add_to_div($div, $content, $class_name, $id_name)
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
		wrap_in_div_with_class_and_id($content, $class_name, $id_name)
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
		get_table_editor_heading()
	{
		$heading = new HTMLTags_Heading(2);
		$span = new HTMLTags_Span('Editing Table:&nbsp;');
		$span->set_attribute_str('class', 'edit-text');
		$heading->append_tag_to_content($span);
		$heading->append_str_to_content($this->table->get_name());
		return $heading;
	}

	private function
		get_oedipus_table_div()
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'oedipus-table');
		$div->append_tag_to_content(new Oedipus_OedipusHTMLTable($this->table));
		return $div;
	}

	private function
		get_table_editor_instructions_div()
	{
		$instructions_div = new HTMLTags_Div();
		$instructions_div->set_attribute_str('class', 'table-editor-instructions');

		$db_page = DBPages_SPoE::get_filtered_page_section('table-editor', 'instructions');
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

	private function
		get_oedipus_html_table_name_editor_form()
	{
		return new Oedipus_OedipusTableNameEditorHTMLForm($this->table);
	}

	private function
		get_oedipus_html_table_editor_actions_ul()
	{
		return new Oedipus_OedipusTableEditorTableActionsUL($this->table);
	}

	private function
		get_oedipus_html_actor_editor_form(Oedipus_Actor $actor)
	{
		return new Oedipus_OedipusActorEditorHTMLForm($this->table, $actor);
	}

	private function
		get_oedipus_html_actor_actions_ul(Oedipus_Actor $actor)
	{
		return new Oedipus_OedipusTableEditorActorActionsUL($this->table, $actor);
	}

	private function
		get_oedipus_html_option_editor_form(Oedipus_Option $option, $iteration)
	{
		return new Oedipus_OedipusOptionEditorHTMLForm($this->table, $option, $iteration);
	}

	private function
		get_oedipus_html_option_actions_ul(Oedipus_Option $option)
	{
		return new Oedipus_OedipusTableEditorOptionActionsUL($this->table, $option);
	}

	private function
		get_oedipus_html_table_editor_page_actions_ul()
	{
		return new Oedipus_OedipusTableEditorPageActionsUL($this->table);
	}
}
?>
