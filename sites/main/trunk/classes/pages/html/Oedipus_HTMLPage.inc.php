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
		echo '<div id="navigation">';
		Navigation_1DULRenderer::render_ul('Main Nav');
		echo '</div>';
	}

	public function
		render_head_link_styles()
	{

	}


	public function 
		render_head_link_stylesheet() 
	{ 
//                HTMLTags_LinkRenderer 
//                        ::render_style_sheet_link( 
//                                'http://yui.yahooapis.com/2.3.1/build/reset-fonts-grids/reset-fonts-grids.css' 
//                        ); 
//                HTMLTags_LinkRenderer 
//                        ::render_style_sheet_link( 
//                                'http://yui.yahooapis.com/2.3.1/build/base/base-min.css' 
//                        ); 
		HTMLTags_LinkRenderer 
			::render_style_sheet_link( 
				'/styles/reset.css' 
			); 
		HTMLTags_LinkRenderer 
			::render_style_sheet_link( 
				'/styles/style.css' 
			); 
	} 

	public function
		render_body_div_footer()
	{
		echo '<div id="footer">';

		Navigation_1DULRenderer::render_ul('Footer Nav');
		DBPages_PageRenderer::render_page_section('all', 'footer');

		echo '</div>';
	}

	/** 
	 * This is a bit ugly but I'm not sure how else to do this. 
	 * 
	 * The default action is to print nothing but this can be extended. 
	 */ 
	public function 
		render_head_script_javascript() 
	{ 
	}

}
?>
