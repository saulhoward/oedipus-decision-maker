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
					Oedipus_DramaEditorHelper
						::get_drama_by_unique_name(
							$_GET['drama_unique_name']
						)
				);

				//                        print_r($_GET);exit;
				$drama_editor_page_div =
					$this->get_oedipus_drama_editor_page_div();
			} catch (Exception $e) {
				/*
				 * See
				 * http://code.google.com/p/oedipus-decision-maker/issues/detail?id=7
				 * RFI 2008-04-29
				 */
			}
#		} elseif (isset($_GET['drama_id'])) {
#			$this->set_drama(
#			    Oedipus_DramaEditorHelper
#					::get_drama_by_id(
#						$_GET['drama_id']
#					)
#			);
#		}
#<<<<<<< .mine
#		
#		if ($this->has_drama()) {
#			/*
#			 * Make a link back to the drama's page.
#			 */
#			
#			$drama = $this->get_drama();
#			
#			$drama_view = $drama->get_view();
#			
#			$drama_view->render_link_back_to_view_page_p();
#			
#			/*
#			 * Show the tables of the drama.
#			 */
#			
#=======
		} elseif (isset($_GET['drama_id']))
		{
			try
			{
				$this->drama =
					Oedipus_DramaEditorHelper::get_drama_by_id($_GET['drama_id']);

#>>>>>>> .r55
#<<<<<<< .mine
#			$drama_editor_page_div =
#			    $this->get_oedipus_drama_editor_page_div();
#		} else {
#=======
				$drama_editor_page_div =
					$this->get_oedipus_drama_editor_page_div();
			}
			catch (Exception $e)
			{

			}
		}
		else
		{
#>>>>>>> .r55
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

		if (isset($this->drama))
		{
			$drama_editor_page_div->append_tag_to_content(
				$this->get_drama_heading()
			);

			$drama_editor_page_div->append_tag_to_content(
				$this->get_oedipus_html_drama_div()
			);
		}

		return $drama_editor_page_div;
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
			//$left_div->append_tag_to_content($this->get_drama_page_table_instructions_div());
			$drama_div->append_tag_to_content($left_div);

			$right_div = new HTMLTags_Div();
			$right_div->set_attribute_str('class', 'right-column');
			# The notes etc. added here
			$right_div->append_tag_to_content($this->get_table_notes_form($table));

			$drama_div->append_tag_to_content($right_div);

			$clear_div = new HTMLTags_Div();
			$clear_div->set_attribute_str('class', 'clear-columns');
			$drama_div->append_tag_to_content($clear_div);
		}

		// CREATE TABLE FORM
		$drama_div->append_tag_to_content($this->get_add_table_form());

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
		$span = new HTMLTags_Span('Editing:&nbsp;');
		$span->set_attribute_str('class', 'edit-text');
		$heading->append_tag_to_content($span);
		$heading->append_str_to_content($this->drama->get_name());
		return $heading;
	}

	private function
		get_oedipus_table_div(Oedipus_Table $table)
	{
		$table_div = new HTMLTags_Div();
		$table_div->set_attribute_str('class', 'oedipus-table');
		$table_div->append_tag_to_content($this->get_oedipus_html_table($table));
		$table_div->append_tag_to_content($this->get_oedipus_html_table_options($table));
		return $table_div;
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
		get_table_notes_form(Oedipus_Table $table)
	{
		if (Oedipus_NotesHelper::has_table_got_note($table->get_id()))
		{
			$note = Oedipus_NotesHelper::get_note_by_table_id($table->get_id());
			return new Oedipus_EditTableNoteHTMLForm($note, $this->drama);
		}
		else
		{
			return new Oedipus_AddTableNoteHTMLForm($this->drama, $table);
		}
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
		get_create_new_drama_div()
	{
		$form_div = new HTMLTags_Div();
		$form_div->set_attribute_str('class', 'add-drama-form');
		$html_form = $this->get_add_drama_form();
		$form_div->append_tag_to_content($html_form);
		return $form_div;
	}

	private function
		get_add_table_form()
	{
		return new Oedipus_AddTableHTMLForm($this->drama);
	}
}
?>