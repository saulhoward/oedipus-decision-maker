<?php
/**
 * Oedipus_SceneDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Main SceneDiv
 * extended by Oedipus_TreeViewSceneDiv
 * and Oedipus_FrameViewSceneDiv
 *
 */

abstract class
	Oedipus_SceneDiv
extends
	HTMLTags_Div
{
	protected $scene;

	public function
		__construct(Oedipus_Scene $scene)
	{
		parent::__construct();
		$this->set_scene($scene);

		$this->set_attribute_str('class', 'scene');

		$this->append(
			$this->get_scene_content_div()
		);
	}

	protected function
		get_scene_content_div()
	{
                /*
		 * Extend this to add scene functionality
                 */
	}

	protected function
		get_frame_div(Oedipus_Frame $frame)
	{
                /*
		 * Extended by Oedipus_FrameViewSceneDiv
                 */
	}

	protected function
		get_scene()
	{
		return $this->scene;
	}

	protected function
		set_scene(Oedipus_Scene $scene)
	{
		$this->scene = $scene;
	}
}
?>
