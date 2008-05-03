<?php
/**
 * Oedipus_ShareDramaPage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 * @copyright 2008-04-27, SANH
 */

class
Oedipus_ShareDramaPage
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
			DBPages_PageRenderer::render_page_section('share-drama', 'title');
			DBPages_PageRenderer::render_page_section('share-drama', 'no-drama-set');
		}

		echo $drama_page_div->get_as_string();
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
			echo '<h2><span class="share-text">Share</span>&nbsp;' 
				. $this->drama->get_name() 
				. '</h2>';

			$drama_page_div->append_tag_to_content($this->get_oedipus_share_drama_div());
		}

		return $drama_page_div;
	}

	private function
		get_oedipus_share_drama_div()
	{
		$drama_div = new HTMLTags_Div();
		$drama_div->set_attribute_str('class', 'share-drama');

		/*
		 * RSS, Facebook
		 */

		return $drama_div;
	}

	private function
		get_oedipus_drama_page_actions()
	{
		return new Oedipus_OedipusShareDramaPageActionsUL($this->drama);
	}
}
?>
