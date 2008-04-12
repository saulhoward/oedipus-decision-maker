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
	public function
		content()
	{
		if (isset($_GET['drama_unique_name']))
		{
			$drama = Oedipus_DramaEditorHelper::get_drama_by_unique_name($_GET['drama_unique_name']);
			echo '<h2>Editing Drama <span class="drama_name">' 
				. $drama->get_name() 
				. '</span></h2>';
			$drama_editor_page_div =
			       	Oedipus_DramaEditorHelper::render_oedipus_drama_editor_page_div($drama);
		}
		else
		{
			// NO DRAMA SET
			DBPages_PageRenderer::render_page_section('drama-editor', 'title');
			DBPages_PageRenderer::render_page_section('drama-editor', 'instructions');
			$drama_editor_page_div = new HTMLTags_Div();
			$drama_editor_page_div->append_tag_to_content(
				Oedipus_DramaEditorHelper::render_all_dramas_ul()
			);
			$drama_editor_page_div->append_tag_to_content(
				Oedipus_DramaEditorHelper::render_create_new_drama_div()
			);
		}

		echo $drama_editor_page_div->get_as_string();
	}

}
?>
