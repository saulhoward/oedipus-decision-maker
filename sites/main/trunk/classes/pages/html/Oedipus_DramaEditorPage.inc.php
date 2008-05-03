<?php
/**
 * Oedipus_DramaEditorPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 */

class
Oedipus_DramaEditorPage
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

				//                        print_r($_GET);exit;
				$drama_editor_page_div =
					$this->get_oedipus_drama_editor_page_div();
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

				$drama_editor_page_div =
					$this->get_oedipus_drama_editor_page_div();
			}
			catch (Exception $e)
			{

			}
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

		if (isset($this->drama))
		{
			echo '<h2><span class="edit_txt">Editing</span>&nbsp;' 
				. $this->drama->get_name() 
				. '</h2>';

			$drama_editor_page_div->append_tag_to_content(
				$this->get_oedipus_html_drama_editor_page_actions_ul()
			);

			$drama_editor_page_div->append_tag_to_content($this->get_oedipus_html_drama_div());
		}

		return $drama_editor_page_div;
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
		get_oedipus_html_drama_div()
	{
		$drama_div = new HTMLTags_Div();
		$drama_div->set_attribute_str('class', 'oedipus-drama');

		// SHOW THE TABLES
		foreach ($this->drama->get_tables() as $table)
		{
			$table_div = new HTMLTags_Div();
			$table_div->set_attribute_str('class', 'oedipus-table');

			$html_table = 
				$this->get_oedipus_html_table($table);
			$table_div->append_tag_to_content($html_table);

			$html_table_options = 
				$this->get_oedipus_html_table_options($table);
			$table_div->append_tag_to_content($html_table_options);

			$drama_div->append_tag_to_content($table_div);

		}

		// CREATE TABLE FORM
		$drama_div->append_tag_to_content($this->get_add_table_form());

		return $drama_div;
	}

	private function
		get_oedipus_html_table(Oedipus_Table $table)
	{
		return new Oedipus_OedipusHTMLTable($table, FALSE);
	}

	private function
		get_oedipus_html_table_options(Oedipus_Table $table)
	{
		return new Oedipus_OedipusTableOptionsUL($table);
	}

	private function
		get_oedipus_html_drama_editor_page_actions_ul()
	{
		return new Oedipus_OedipusDramaEditorPageActionsUL($this->drama);
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

	private function
		get_add_table_form()
	{
		return new Oedipus_AddTableHTMLForm($this->drama);
	}
}
?>
