<?php
/**
 * Oedipus_EditFramePage
 *
 * @copyright 2008-03-30, RFI
 * @copyright 2008-04-11, SANH
 */

class
Oedipus_EditFramePage
extends
Oedipus_RestrictedPage
{
	private $frame;

	public function
		content()
	{
		if (isset($_GET['frame_id']))
		{
			//print_r($_GET);exit;
			$this->frame = Oedipus_FrameHelper
				::get_frame_by_id(
					$_GET['frame_id']
				);
			$frame_editor_page_div 
				= $this->get_edit_frame_page_div();

			echo $frame_editor_page_div->get_as_string();
		}
		else
		{
			// NO frame SET
			DBPages_PageRenderer
				::render_page_section(
					'edit-frame', 'title'
				);
			DBPages_PageRenderer
				::render_page_section(
					'edit-frame', 'no-frame-set'
				);
		}
	}

	private function
		get_edit_frame_page_div()
	{
		return new Oedipus_EditFrameDiv($this->frame);
	}
}
?>
