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
			$this->get_links_ul()
		);

		$home_page_div->append_tag_to_content(
			$this->get_latest_frames_div()
		);

		$home_page_div->append_tag_to_content(
			$this->get_google_code_rss_div()
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
		get_google_code_rss_div()
	{
		return Oedipus_RSSHelper::get_google_code_rss_div();
	}

	private function
		get_oedipus_frame_div(Oedipus_Table $frame)
	{
		$frame_div = new HTMLTags_Div();
		$frame_div->set_attribute_str('class', 'oedipus-frame');

		//$frame_div->append_tag_to_content(
			//$this->get_oedipus_html_frame($frame)
		//);

		$frame_div->append_tag_to_content(
			$this->get_oedipus_png_frame($frame)
		);

		$frame_div->append_tag_to_content(
			$this->get_oedipus_html_frame_options($frame)
		);

		return $frame_div;
	}
	
	/**
	 * Shouldn't this be moved to a helper class?
	 * Wouldn't it be useful elsewhere?
	 *
	 * 
	 * @param Oedipus_Table $frame The frame that we want to display.
	 * @return HTMLTags_IMG The html tag object that will be rendered to display the image.
	 */
	private function
		get_oedipus_png_frame_img(Oedipus_Frame $frame)
	{
		/*
		 * Are these global values?
		 * Should they be set in a file somewhere and returned
		 * from a helper function?
		 */
		$max_width = 250;
		$max_height = 185;
		
		/*
		 * Should this be moved to its own function?
		 * e.g.
		 * 	Oedipus_TableImagesHelper
		 * 	::get_frame_thumbnail_img_url(...)
		 */
		$url = new HTMLTags_URL();
		$url->set_file(
			'/frames/images/thumbnails/option-frame-'
			. $frame->get_id()
			. '_' . $max_width . 'x' . $max_height . '.png'
		);
		
		$img = new HTMLTags_IMG();
		
		$img->set_src($url);
		$img->set_alt($frame->get_name());
		
		return $img;
	}

	private function
		get_home_page_frame_instructions_div()
	{
		$instructions_div = new HTMLTags_Div();
		$instructions_div->set_attribute_str(
			'class', 'instructions'
		);
		$instructions_div->set_attribute_str(
			'id', 'drama-page-frame'
		);

		$db_page = DBPages_SPoE::get_filtered_page_section(
			'drama', 'frame-instructions'
		);
		$instructions_div->append_str_to_content($db_page);	

		return $instructions_div;
	}

	private function
		get_oedipus_home_page_actions()
	{
		return new Oedipus_DramaPageActionsUL($this->drama);
	}

	private function
		get_all_dramas_ul()
	{
		return new Oedipus_AllDramasUL();
	}

	private function
		get_oedipus_html_frame_options(Oedipus_Frame $frame)
	{
		return new Oedipus_FrameOptionsUL($frame, FALSE);
	}

	private function
		get_latest_frames_div()
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'frame_thumbnail_list');

		$heading = new HTMLTags_Heading(3, 'Latest Frames');

		$div->append_tag_to_content($heading);

		$ul = new HTMLTags_UL();

		$frames = Oedipus_FrameHelper
			::get_latest_option_frames(4);

		foreach ($frames as $frame)
		{
			$li = new HTMLTags_LI();
			
			$a = $this->get_oedipus_png_frame_img_a($frame);
			$li->append_tag_to_content($a);
			$ul->append_tag_to_content($li);
		}

		$div->append_tag_to_content($ul);
		return $div;
	}
	
	/**
	 * Should the content of this function be refactored to a static
	 * function in a helper class?
	 * 
	 * @param Oedipus_Frame $frame The frame that we want to display.
	 * @return HTMLTags_A A link to the page for the drama of $frame.
	 */
	private function
		get_oedipus_png_frame_img_a(
			Oedipus_Frame $frame
		)
	{
		$url = Oedipus_FrameHelper
			::get_drama_url_for_frame($frame);
		
		$a = new HTMLTags_A();
		$a->set_href($url);
		$a->set_attribute_str('title', 'View this Drama');
		
		$img = $this->get_oedipus_png_frame_img($frame);

		$a->append_tag_to_content($img);
		
		return $a;
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
		get_links_ul()
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
