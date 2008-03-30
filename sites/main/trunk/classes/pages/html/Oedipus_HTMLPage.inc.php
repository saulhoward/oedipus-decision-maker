<?php
/**
 * Oedipus_HTMLPage
 *
 * @copyright 2008-03-30, RFI
 */

abstract class
	Oedipus_HTMLPage
extends
	PublicHTML_HTMLPage
{
	public function
		render_body_div_navigation()
	{
		Navigation_1DULRenderer::render_ul('Left Nav');
	}
}
?>