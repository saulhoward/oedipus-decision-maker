<?php
/**
 * Oedipus_DBPage
 *
 * @copyright 2008-03-30
 */

class
	Oedipus_DBPage
extends
	Oedipus_HTMLPage
{
	public function
		content()
	{
		DBPages_PageRenderer::render_current_page_content();
	}
}
?>