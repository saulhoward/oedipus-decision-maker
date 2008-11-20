<?php
/**
 * Oedipus_EditSceneNameHTMLForm
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 */

/**
 * Oedipus Form for editing Scenes' names
 *
 * extends:
 * Oedipus_SceneEditorHTMLForm
 */

class
Oedipus_EditSceneNameHTMLForm
extends
Oedipus_EditSceneHTMLForm
{
	public function
		__construct(Oedipus_Scene $scene)
	{
		parent::__construct($scene, 'scene_name_editor');

		# scene Name Input
		$this->add_input_name_with_value('scene_name', $scene->get_name(), 'scene');
	}
}
?>
