<?php
/**
 * Oedipus_HomePage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 * @copyright 2008-04-27, SANH
 */

class
Oedipus_HomePage
extends
Oedipus_HTMLPage
{
	public function
		content()
	{
			// NO DRAMA SET
			DBPages_PageRenderer::render_page_section('home', 'content');

			$home_page_div = new HTMLTags_Div();
			$home_page_div->append_tag_to_content(
				$this->get_latest_tables_div()
			);

		echo $home_page_div->get_as_string();
	}

	private function
		get_oedipus_home_page_div()
	{
		$home_page_div = new HTMLTags_Div();
		$home_page_div->set_attribute_str('class', 'drama');

		$home_page_options = $this->get_oedipus_home_page_actions();
		$home_page_div->append_tag_to_content($home_page_options);
		return $home_page_div;
	}

	/*
	 * Functions to call in the html-tags
	 * classes for the page elements
	 *
	 */
	private function
		get_oedipus_table_div(Oedipus_Table $table)
	{
		$table_div = new HTMLTags_Div();
		$table_div->set_attribute_str('class', 'oedipus-table');

//                $table_div->append_tag_to_content($this->get_oedipus_html_table($table));
		$table_div->append_tag_to_content($this->get_oedipus_png_table($table));

		$table_div->append_tag_to_content($this->get_oedipus_html_table_options($table));

		return $table_div;
	}

	private function
		get_oedipus_png_table_img(Oedipus_Table $table)
	{
		$max_width = 250;
		$max_height = 185;
		$url = new HTMLTags_URL();
		$url->set_file(
			'/tables/images/thumbnails/option-table-'
			. $table->get_id()
			. '_' . $max_width . 'x' . $max_height . '.png'
		);
		$img = new HTMLTags_IMG();
		$img->set_src($url);
		$img->set_alt($table->get_name());
		return $img;
	}

	private function
		get_home_page_table_instructions_div()
	{
		$instructions_div = new HTMLTags_Div();
		$instructions_div->set_attribute_str('class', 'instructions');
		$instructions_div->set_attribute_str('id', 'drama-page-table');

		$db_page = DBPages_SPoE::get_filtered_page_section('drama', 'table-instructions');
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

	private function
		get_oedipus_home_page_actions()
	{
		return new Oedipus_OedipusDramaPageActionsUL($this->drama);
	}

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_OedipusAllDramasUL();
	}

	private function
		get_oedipus_html_table_options(Oedipus_Table $table)
	{
		return new Oedipus_OedipusTableOptionsUL($table, FALSE);
	}

	private function
		get_latest_tables_div()
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'table_thumbnail_list');

		$heading = new HTMLTags_Heading(3, 'Latest Option Tables');

		$div->append_tag_to_content($heading);

		$ul = new HTMLTags_UL();

		$tables = Oedipus_TableCreationHelper::get_latest_option_tables(4);

		foreach ($tables as $table)
		{
			$li = new HTMLTags_LI();

			$a = $this->get_oedipus_png_table_img_a($table);
			$li->append_tag_to_content($a);
			$ul->append_tag_to_content($li);
		}

		$div->append_tag_to_content($ul);
		return $div;
	}

	private function
		get_oedipus_png_table_img_a(Oedipus_Table $table)
	{
		$url = Oedipus_TableCreationHelper::get_drama_url_for_table($table);

		$a = new HTMLTags_A();
		$a->set_href($url);
		$a->set_attribute_str('title', 'View this Drama');

		$img = $this->get_oedipus_png_table_img($table);
		$a->append_tag_to_content($img);

		return $a;
	}
}
?>
