<?php
/**
 * Oedipus_ExceptionPage
 *
 * @copyright 2008-03-30, RFI
 */

class
	Oedipus_ExceptionPage
extends
	Oedipus_HTMLPage
{
	public function
		content()
	{
		PublicHTML_ExceptionRenderer::render_exception_div_from_session();
	}
}
?>