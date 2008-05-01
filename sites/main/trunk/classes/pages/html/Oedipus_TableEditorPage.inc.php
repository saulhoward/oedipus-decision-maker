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
	private $table_editor_page_div;

	public function
		content()
	{
		if (isset($_GET['table_id']))
		{
			//                        print_r($_GET);exit;
			$this->table = Oedipus_TableCreationHelper::get_oedipus_table_by_id($_GET['table_id']);
			$this->set_oedipus_table_editor_page_div();

			echo $this->table_editor_page_div->get_as_string();
		}
		else
		{
			// NO TABLE SET
			DBPages_PageRenderer::render_page_section('table-editor', 'title');
			DBPages_PageRenderer::render_page_section('table-editor', 'no-table-set');
		}
	}

	private function
		set_oedipus_table_editor_page_div()
	{
		echo '<h2>Editing Table <span class="table_name">' 
			. $this->table->get_name() 
			. '</span></h2>';

		$this->table_editor_page_div = new HTMLTags_Div();
		$this->table_editor_page_div->set_attribute_str('class', 'table-editor');

		if (isset($this->table))
		{
			$this->wrap_element_with_class_and_add_to_page_div(
				$this->get_oedipus_html_table_editor_page_options_ul(),
				'table-editor-page-options'
			)

			$this->wrap_element_with_class_and_add_to_page_div(
				$this->get_oedipus_html_table(),
				'oedipus-table'
			)
	
			//Table Name form
			$this->wrap_element_with_class_and_add_to_page_div(
				$this->get_oedipus_html_table_name_editor_form(),
				'table-editor-form'
			)
	
			//Table actions UL
			$this->wrap_element_with_class_and_add_to_page_div(
				$this->get_oedipus_html_table_editor_actions_ul(),
				'table-editor-form'
			)

			foreach ($this->table->get_actors() as $actor)
			{
				//Actor form
				$this->wrap_element_with_class_and_add_to_page_div(
					$this->get_oedipus_html_actor_editor_form($actor),
					'table-editor-form'
				)
			}
	
		}
	}

	private function
		wrap_element_with_class_and_add_to_page_div($content, $class_name)
	{
		$this->table_editor_page_div->append_tag_to_content(
			$this->wrap_in_div_with_class(
				$content,
				$class_name
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
		get_oedipus_html_table()
	{
		return new Oedipus_OedipusHTMLTable($this->table);
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
		get_oedipus_html_table_editor_page_options_ul()
	{
		return new Oedipus_OedipusTableEditorPageOptionsUL($this->table);
	}
}
?>
