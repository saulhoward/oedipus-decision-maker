<?php
/**
 * Oedipus_DramaPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 * @copyright 2008-04-27, SANH
 */

class
Oedipus_DramaPage
extends
Oedipus_HTMLPage
{
	private $drama;

	public function
		content()
	{
		if (isset($_GET['drama_unique_name']))
		{
			try
			{
				$this->drama =
					Oedipus_DramaEditorHelper
					::get_drama_by_unique_name($_GET['drama_unique_name']);

				$drama_page_div =
					$this->get_oedipus_drama_page_div();
			}
			catch (Exception $e)
			{

			}
		}
		elseif (isset($_GET['drama_id']))
		{

			try
			{
				$this->drama =
					Oedipus_DramaEditorHelper::get_drama_by_id($_GET['drama_id']);

				$drama_page_div =
					$this->get_oedipus_drama_page_div();

			}
			catch (Exception $e)
			{

			}
		}
		else
		{
			// NO DRAMA SET
			DBPages_PageRenderer::render_page_section('drama', 'title');
			DBPages_PageRenderer::render_page_section('drama', 'no-drama-set');

			$drama_page_div = new HTMLTags_Div();
			$drama_page_div->append_tag_to_content(
				$this->get_all_dramas_ul()
			);
			$drama_page_div->append_tag_to_content(
				$this->get_create_new_drama_div()
			);
		}

		echo $drama_page_div->get_as_string();
	}

	private function
		get_oedipus_drama_page_div()
	{
		$drama_page_div = new HTMLTags_Div();
		$drama_page_div->set_attribute_str('class', 'drama');

		$drama_page_options = $this->get_oedipus_drama_page_actions();
		$drama_page_div->append_tag_to_content($drama_page_options);

		if (isset($this->drama))
		{
			$drama_page_div->append_tag_to_content(
				$this->get_drama_heading()
			);

			$drama_page_div->append_tag_to_content(
				$this->get_oedipus_html_drama_div()
			);
		}

		return $drama_page_div;
	}

	private function
		get_oedipus_html_drama_div()
	{
		$drama_div = new HTMLTags_Div();
		$drama_div->set_attribute_str('class', 'oedipus-drama');

		// SHOW THE TABLES
		foreach ($this->drama->get_tables() as $table)
		{
			# The left and right column divs
			$left_div = new HTMLTags_Div();
			$left_div->set_attribute_str('class', 'left-column');

			# The table itself
			$left_div->append_tag_to_content($this->get_oedipus_table_div($table));
			# The instructions
//                        $left_div->append_tag_to_content($this->get_drama_page_table_instructions_div());

			$drama_div->append_tag_to_content($left_div);

			$right_div = new HTMLTags_Div();
			$right_div->set_attribute_str('class', 'right-column');
			# The notes etc. added here
			#
			$drama_div->append_tag_to_content($right_div);

			$clear_div = new HTMLTags_Div();
			$clear_div->set_attribute_str('class', 'clear-columns');
			$drama_div->append_tag_to_content($clear_div);
		}

		return $drama_div;
	}

	/*
	 * Functions to call in the html-tags
	 * classes for the page elements
	 *
	 */
	private function
		get_drama_heading()
	{
		$heading = new HTMLTags_Heading(2);
//                $span = new HTMLTags_Span('Drama:&nbsp;');
//                $span->set_attribute_str('class', 'edit-text');
//                $heading->append_tag_to_content($span);
		$heading->append_str_to_content($this->drama->get_name());
		return $heading;
	}

	private function
		get_create_new_drama_div()
	{
		$form_div = new HTMLTags_Div();
		$form_div->set_attribute_str('class', 'new-drama-form');
		$html_form = $this->get_add_drama_form();
		$form_div->append_tag_to_content($html_form);
		return $form_div;
	}

	private function
		get_oedipus_table_div(Oedipus_Table $table)
	{
		$table_div = new HTMLTags_Div();
		$table_div->set_attribute_str('class', 'oedipus-table');

		$table_div->append_tag_to_content($this->get_oedipus_html_table($table));
		return $table_div;
	}

	private function
		get_oedipus_html_table(Oedipus_Table $table)
	{
		# Get a table that's not editable
		return new Oedipus_OedipusHTMLTable($table, FALSE);
	}

	private function
		get_drama_page_table_instructions_div()
	{
		$instructions_div = new HTMLTags_Div();
		$instructions_div->set_attribute_str('class', 'instructions');
		$instructions_div->set_attribute_str('id', 'drama-page-table');

		$db_page = DBPages_SPoE::get_filtered_page_section('drama', 'table-instructions');
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

	private function
		get_oedipus_drama_page_actions()
	{
		return new Oedipus_OedipusDramaPageActionsUL($this->drama);
	}

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_OedipusAllDramasUL();
	}

	private function
		get_add_drama_form()
	{
		return new Oedipus_AddDramaHTMLForm();
	}


}
?>
