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
	public function
		__construct(Oedipus_Scene $scene)
	{
		parent::__construct($scene);
	}

	protected function
		get_scene_content_div()
	{
                /*
		 * Using Tree View
                 */

		$div = new HTMLTags_Div();
		$div->append(
			Oedipus_FrameTreeHelper::get_frame_tree_div(
				$this->scene
			)
		);
		return $div;
	}
}
?>
