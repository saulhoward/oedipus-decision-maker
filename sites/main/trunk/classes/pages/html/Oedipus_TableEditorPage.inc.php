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
			$table_editor_page_div =
				$this->get_oedipus_table_editor_page_div();

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
		echo '<h2>Editing Table <span class="table_name">' 
			. $this->table->get_name() 
			. '</span></h2>';

		$table_editor_page_div = new HTMLTags_Div();
		$table_editor_page_div->set_attribute_str('class', 'table-editor');

		if (isset($this->table))
		{
			$links_div = new HTMLTags_Div();
			$links_div->set_attribute_str('class', 'table-editor-page-options');
			$html_table = $this->get_oedipus_html_table_editor_page_options_ul();
			$links_div->append_tag_to_content($html_table);
			$table_editor_page_div->append_tag_to_content($links_div);

			$table_div = new HTMLTags_Div();
			$table_div->set_attribute_str('class', 'oedipus-table');
			$html_table = $this->get_oedipus_html_table();
			$table_div->append_tag_to_content($html_table);
			$table_editor_page_div->append_tag_to_content($table_div);

			$form_div = new HTMLTags_Div();
			$form_div->set_attribute_str('class', 'table-editor-form');
			$html_form = $this->get_oedipus_html_table_editor_form();
			$form_div->append_tag_to_content($html_form);
			$table_editor_page_div->append_tag_to_content($form_div);
		}
		return $table_editor_page_div;
	}

	private function
		get_oedipus_html_table()
	{
		return new Oedipus_OedipusHTMLTable($this->table);
	}

	private function
		get_oedipus_html_table_editor_form()
	{
		return new Oedipus_OedipusTableEditorHTMLForm($this->table);
	}

	private function
		get_oedipus_html_table_editor_page_options_ul()
	{
		return new Oedipus_OedipusTableEditorPageOptionsUL($this->table);
	}

}
?>
