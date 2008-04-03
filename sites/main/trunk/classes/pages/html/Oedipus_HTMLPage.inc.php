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
	
	public function
		render_head_link_styles()
	{

	}
	
	public function 
		render_head_link_stylesheet() 
	{ 
		HTMLTags_LinkRenderer 
			::render_style_sheet_link( 
				'http://yui.yahooapis.com/2.3.1/build/reset-fonts-grids/reset-fonts-grids.css' 
			); 
		HTMLTags_LinkRenderer 
			::render_style_sheet_link( 
				'http://yui.yahooapis.com/2.3.1/build/base/base-min.css' 
			);
		HTMLTags_LinkRenderer 
			::render_style_sheet_link( 
				'/styles/style.css' 
			); 
	}
	
	public function 
		render_head_script_javascript() 
	{ 
	}
}
?>