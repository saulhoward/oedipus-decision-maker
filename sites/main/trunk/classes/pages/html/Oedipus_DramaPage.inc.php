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
		get_create_new_drama_div()
	{
		$form_div = new HTMLTags_Div();
		$form_div->set_attribute_str('class', 'new-drama-form');
		$html_form = $this->get_add_drama_form();
		$form_div->append_tag_to_content($html_form);

		return $form_div;
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
			echo '<h2>' 
				. $this->drama->get_name() 
				. '</h2>';

			$drama_page_div->append_tag_to_content($this->get_oedipus_html_drama_div());
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
			$table_div = new HTMLTags_Div();
			$table_div->set_attribute_str('class', 'oedipus-table');

			$table_div->append_tag_to_content($this->get_oedipus_html_table($table));

			$drama_div->append_tag_to_content($table_div);
		}

		return $drama_div;
	}

	private function
		get_oedipus_html_table(Oedipus_Table $table)
	{
		return new Oedipus_OedipusHTMLTable($table, FALSE);
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
