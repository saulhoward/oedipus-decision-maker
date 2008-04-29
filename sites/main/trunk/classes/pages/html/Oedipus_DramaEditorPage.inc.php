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
			$this->drama =
			       	Oedipus_DramaEditorHelper::get_drama_by_id($_GET['drama_id']);

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

		if (isset($this->drama))
		{
			echo '<h2>Editing Drama <span class="drama_name">' 
				. $this->drama->get_name() 
				. '</span></h2>';


			$drama_div = new HTMLTags_Div();
			$drama_div->set_attribute_str('class', 'oedipus-drama');
			$html_drama = $this->get_oedipus_html_drama_div();
			$drama_div->append_tag_to_content($html_drama);
			$drama_editor_page_div->append_tag_to_content($drama_div);

			//                $form_div = new HTMLTags_Div();
			//                $form_div->set_attribute_str('class', 'drama-editor-form');
			//   $html_form = 
			//   Oedipus_TableCreatorHelper::render_oedipus_html_drama_editor_form($drama);
			//                $form_div->append_tag_to_content($html_form);
			//                $drama_editor_page_div->append_tag_to_content($form_div);
		}

		return $drama_editor_page_div;
	}

	private function
		get_create_new_drama_div()
	{
		$drama_editor_page_div = new HTMLTags_Div();
		$drama_editor_page_div->set_attribute_str('class', 'drama-editor');

		$form_div = new HTMLTags_Div();
		$form_div->set_attribute_str('class', 'new-drama-form');
		$html_form = $this->get_html_new_drama_form();
		$form_div->append_tag_to_content($html_form);
		$drama_editor_page_div->append_tag_to_content($form_div);

		return $drama_editor_page_div;
	}

	private function
		get_oedipus_html_drama_div()
	{
		$drama_div = new HTMLTags_Div();

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
		$drama_div->append_tag_to_content($this->get_html_new_table_form());

		return $drama_div;
	}

	private function
		get_oedipus_html_table(Oedipus_Table $table)
	{
		return new Oedipus_OedipusHTMLTable($table);
	}

	private function
		get_oedipus_html_table_options(Oedipus_Table $table)
	{
		return new Oedipus_OedipusTableOptionsUL($table);
	}

	private function
		get_html_new_table_form()
	{
		$form = new HTMLTags_SimpleOLForm('new_table');
		$form->set_legend_text('New Table');

		// action
		$form_action = $this->get_new_table_form_action_url();
		$form->set_action($form_action);

		// cancel
		$form_cancel = $this->get_new_table_form_cancel_url();
		$form->set_cancel_location($form_cancel);

		// Drama Name Input
		$form->add_input_name_with_value('table_name', '', 'Table Name:');
		// Hidden Inputs
		$form->add_hidden_input('new_table', 1);
		$form->add_hidden_input('drama_unique_name', $this->drama->get_unique_name());

		$form->set_submit_text('Create Table');

		return $form;
	}
	private function
		get_all_dramas_ul()
	{
		$ul = new HTMLTags_UL();

		$dramas = Oedipus_DramaEditorHelper::get_all_dramas();

		foreach ($dramas as $drama)
		{
			$li = new HTMLTags_LI();
			$link = new HTMLTags_A($drama->get_name());
			$link->set_href(Oedipus_DramaEditorHelper::get_drama_editor_url($drama));
			$li->append_tag_to_content($link);
			$ul->append_tag_to_content($li);
		}

		return $ul;
	}

	private function
		get_html_new_drama_form()
	{
		$form = new HTMLTags_SimpleOLForm('new_drama');
		$form->set_legend_text('New Drama');

		// action
		$form_action = self::get_new_drama_form_action_url();
		$form->set_action($form_action);

		// cancel
		$form_cancel = self::get_new_drama_form_cancel_url();
		$form->set_cancel_location($form_cancel);

		// Drama Name Input
		$form->add_input_name_with_value('drama_name', '', 'Drama Name:');
		// Hidden Inputs
		$form->add_hidden_input('new_drama', 1);

		$form->set_submit_text('Create Drama');

		return $form;
	}


	//        Functions for
	//        Creating URLs
	//
	// FORM URLS
	//
	// FORM URLS
	private function
		get_new_drama_form_action_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorRedirectScript');
	}

	private function
		get_new_drama_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage');
	}


	private function
		get_new_table_form_action_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorRedirectScript');
	}

	private function
		get_new_table_form_cancel_url()
	{
		return PublicHTML_URLHelper
			::get_oo_page_url('Oedipus_DramaEditorPage');
	}
}
?>