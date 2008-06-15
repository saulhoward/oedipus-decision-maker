<?php
/**
 * Oedipus_MyDramasPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 * @copyright 2008-04-27, SANH
 */

class
Oedipus_MyDramasPage
extends
Oedipus_RestrictedPage
{
	private $dramas;
	private $user_id;

	public function
		content()
	{
		DBPages_PageRenderer::render_page_section('my-dramas', 'title');

		/*
		 * Get current user
		 */
		$this->user_id = Oedipus_LogInHelper::get_current_user_id();
		//                $user = Oedipus_UsersHelper::get_user($user_id);

		$drama_page_div =
			$this->get_my_dramas_page_div();

		echo $drama_page_div->get_as_string();
	}

	private function
		get_my_dramas_page_div()
	{
		$drama_page_div = new HTMLTags_Div();
		$drama_page_div->set_attribute_str('class', 'my-dramas');

		if (isset($this->user_id))
		{
			$drama_page_div->append_tag_to_content(
				$this->get_all_dramas_ul()
			);
			$drama_page_div->append_tag_to_content(
				$this->get_create_new_drama_div()
			);
		}

		return $drama_page_div;
	}

	/*
	 * Functions to call in the html-tags
	 * classes for the page elements
	 *
	 */
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
		get_oedipus_png_table(Oedipus_Table $table)
	{
		$max_width = 300;
		$max_height = 300;
		$url = new HTMLTags_URL();
		$url->set_file(
			'/tables/images/thumbnails/option-table-'
			. $table->get_id()
			. '_' . $max_width . 'x' . $max_height . '.png'
		);
		$img = new HTMLTags_IMG();
		$img->set_src($url);
		return $img;
	}

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_OedipusMyDramasUL($this->user_id);
	}

	private function
		get_oedipus_html_table_options(Oedipus_Table $table)
	{
		return new Oedipus_OedipusTableOptionsUL($table, FALSE);
	}


	private function
		get_add_drama_form()
	{
		return new Oedipus_AddDramaHTMLForm($this->user_id);
	}
}
?>
