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

				//                        print_r($_GET);exit;
				$drama_page_div =
					$this->get_oedipus_drama_page_div();
			}
			catch (Exception $e)
			{

			}
		}
		elseif (isset($_GET['drama_id']))
		{
			$this->drama =
			       	Oedipus_DramaEditorHelper::get_drama_by_id($_GET['drama_id']);

			$drama_page_div =
			       	$this->get_oedipus_drama_page_div();
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
		}

		echo $drama_page_div->get_as_string();
	}

	private function
		get_oedipus_drama_page_div()
	{
		$drama_page_div = new HTMLTags_Div();
		$drama_page_div->set_attribute_str('class', 'drama');

		$drama_page_options = 
			$this->get_oedipus_drama_page_options();
		$drama_page_div->append_tag_to_content($drama_page_options);

		if (isset($this->drama))
		{
			echo '<h2>Drama <span class="drama_name">' 
				. $this->drama->get_name() 
				. '</span></h2>';


			$drama_div = new HTMLTags_Div();
			$drama_div->set_attribute_str('class', 'oedipus-drama');
			$html_drama = $this->get_oedipus_html_drama_div();
			$drama_div->append_tag_to_content($html_drama);
			$drama_page_div->append_tag_to_content($drama_div);

			//                $form_div = new HTMLTags_Div();
			//                $form_div->set_attribute_str('class', 'drama-editor-form');
			//   $html_form = 
			//   Oedipus_TableCreatorHelper::render_oedipus_html_drama_form($drama);
			//                $form_div->append_tag_to_content($html_form);
			//                $drama_page_div->append_tag_to_content($form_div);
		}

		return $drama_page_div;
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

//                        $html_table_options = 
//                                $this->get_oedipus_html_table_options($table);
//                        $table_div->append_tag_to_content($html_table_options);
//                        
			$drama_div->append_tag_to_content($table_div);

		}

		return $drama_div;
	}

	private function
		get_oedipus_html_table(Oedipus_Table $table)
	{
		return new Oedipus_OedipusHTMLTable($table);
	}

	private function
		get_oedipus_drama_page_options()
	{
		return new Oedipus_OedipusDramaPageOptionsUL($this->drama);
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
			$link->set_href(Oedipus_DramaHelper::get_drama_url($drama));
			$li->append_tag_to_content($link);
			$ul->append_tag_to_content($li);
		}

		return $ul;
	}
}
?>