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
		$home_page_div = new HTMLTags_Div();

		$heading = new HTMLTags_Heading(
			2, 'Drama Theory for Making Decisions'
		);
		$home_page_div->append_tag_to_content($heading);

		$home_page_div->append_tag_to_content(
			$this->get_home_page_welcome_text_div()
		);
		$home_page_div->append_tag_to_content(
			$this->get_external_links_ul()
		);

		$home_page_div->append_tag_to_content(
			$this->get_latest_frames_div()
		);

		$home_page_div->append_tag_to_content(
			$this->get_google_code_rss_div()
		);

		echo $home_page_div->get_as_string();
	}

	/*
	 * Functions to call in the html-tag
	 * classes for the page elements
	 *
	 */

	private function
		get_google_code_rss_div()
	{
		return Oedipus_RSSHelper::get_google_code_rss_div();
	}

	private function
		get_latest_frames_div()
	{
		return Oedipus_DramaHelper::get_latest_frames_div();
	}
	
	private function
		get_home_page_welcome_text_div()
	{
		$welcome_div = new HTMLTags_Div();
		$welcome_div->set_attribute_str('class', 'welcome');

		$db_page = DBPages_SPoE
			::get_filtered_page_section('home', 'welcome');
		$welcome_div->append_str_to_content($db_page);	

		return $welcome_div;
	}

	private function
		get_external_links_ul()
	{
		$welcome_div = new HTMLTags_Div();
		$welcome_div->set_attribute_str('class', 'external-links');

		$welcome_div->append_tag_to_content(
			Navigation_HTMLListsHelper
			::get_1d_ul('External Links')
		);

		return $welcome_div;
	}
}
?>
