<?php
/**
 * Oedipus_TreeViewSceneDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * TreeView version of the
 * Main Scene Div
 *
 */

class
	Oedipus_TreeViewSceneDiv
extends
	Oedipus_SceneDiv
{
	protected function
		get_scene_content_div()
	{
		$div = new HTMLTags_Div();
		# The left and right column divs
		$left_div = new HTMLTags_Div();
		$left_div->set_attribute_str('class', 'left-column');

                /*
		 * Tree View Div
                 */
		$left_div->append(
			Oedipus_FrameTreeHelper::get_frame_tree_div(
				$this->get_scene()
			)
		);

		$div->append_tag_to_content($left_div);

		$right_div = new HTMLTags_Div();
		$right_div->set_attribute_str('class', 'right-column');
                /*
		 * Scene Note Div
                 */
		$right_div->append(
			Oedipus_DramaHelper::get_scene_notes_div(
				$this->get_scene()
			)
		);
		$div->append_tag_to_content($right_div);

		$clear_div = new HTMLTags_Div();
		$clear_div->set_attribute_str('class', 'clear-columns');
		$div->append_tag_to_content($clear_div);

		return $div;
	}
}
?>
