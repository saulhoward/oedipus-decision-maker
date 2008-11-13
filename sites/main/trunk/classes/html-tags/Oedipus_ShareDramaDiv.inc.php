<?php
/**
 * Oedipus_ShareDramaDiv
 *
 * @copyright 2006-11-27, RFI
 * @copyright 2008-04-06, RFI
 * @copyright 2008-04-25, SANH
 * @copyright 2008-11-11, SANH
 */

/**
 * Share Drama Div used on the Oedipus_DramaPage
 *
 * Shows the drama status and some links to share it.
 * Rss maybe
 *
 */

class
Oedipus_ShareDramaDiv
extends
Oedipus_DramaDiv
{
	protected function
		get_content_div()
	{
		$div = new HTMLTags_Div();

		/*
		 * Show the ShareDrama Toolbar with view 
		 * drama and share links
		 */
		$div->append(
			new Oedipus_ShareDramaToolBarUL(
				$this->get_drama()
			)
		);
		/*
		 * Edit status Settings
		 */
		if ($this->get_drama()->is_editable()) {
			$div->append_tag_to_content(
				$this->get_edit_drama_status_form()
			);
		}
		return $div;
	}
	
	private function
		get_edit_drama_status_form()
	{
		return new Oedipus_EditDramaStatusHTMLForm($this->get_drama());
	}
}
?>
