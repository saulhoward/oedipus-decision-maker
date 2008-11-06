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
		render_body()
	{
		$this->render_body_tag_open();

		$this->render_body_div_header();

		$this->render_body_div_account_status();

		$this->render_body_div_navigation();
		$this->render_body_div_content();

		$this->render_body_div_footer();

		echo "</body>\n";

		//                $this->render_google_analytics_js();
	}

	public function
		render_body_div_navigation()
	{
		echo '<div id="navigation">';
//                Navigation_1DULRenderer::render_ul('Main Nav');
		$nav_ul = $this->get_1d_ul_with_selected_li('Main Nav');
		echo $nav_ul->get_as_string();
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

		//                echo '<script src="http://www.google.com/jsapi"></script>' . "\n";
		echo '<script type="text/javascript" 
			src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>' . "\n";
		echo '<script type="text/javascript" src="/scripts/jquery.autogrow.js"></script>' . "\n";
		//echo '<script type="text/javascript" src="/scripts/oedipus-forms.js"></script>' . "\n";
	}

	public function
		render_body_div_account_status()
	{
		echo '<div id="account_status">' . "\n";

		if (isset($_SESSION['logged-in-id'])) {
			//
			// Why do you havve to log in again everytime?
			//
			Oedipus_LogInHelper::log_in($_SESSION['logged-in-id']);

			$user_id = Oedipus_LogInHelper::get_current_user_id();
			$user = Oedipus_UsersHelper::get_user($user_id);

			echo '<ul>';
			echo '<li>';
			echo '<a href="/Oedipus_UserPage">';

			echo stripcslashes($user['email']);
			echo '</a>';

			echo '</li>';
			echo "\n";
?>
<li>
<a href="/Oedipus_LogOutRequest">Log out</a>
</li>
<?php
		} else {
?>
<ul>
<li>
<a href="/Oedipus_RegisterPage">Register</a>
</li>

<li>
<a href="/Oedipus_LoginPage">Log in</a>
</li>
<?php
		}

		echo '</ul>' . "\n";
		echo '</div>' . "\n";
	}

	/*
	 * FROM NAVIGATION PLUG IN
	 * MOVE IT UP
	 */

	private function
		get_1d_ul_with_selected_li(
			$tree_name,
			$class_name = NULL
		)
	{

		$page_class_name = get_class($this);

		if (!isset($class_name)) {
			$class_name = 'navigation';
		}

		$nodes
			= Navigation_1DTreeRetriever
			::get_tree_nodes($tree_name);

		#print_r($nodes);

		#echo "<ul class=\"$class_name\">\n";

		$ul = new HTMLTags_UL();

		$ul->set_class($class_name);

		foreach ($nodes as $node) {
			#Navigation_NodeRenderer::render_node($node);

			$li = new HTMLTags_LI();

			$li->append(
				Navigation_NodesHelper
				::get_link_a($node)
			);

			//                        print_r($page_class_name);exit;
			if (
				(substr($node['url_href'], 1) == $page_class_name)
				||
				(
					($node['url_href'] == '/')
					&&
					($page_class_name == 'Oedipus_HomePage')
				)
			)
			{
				$li->set_class('selected');
			}

			$ul->add_li(
				$li
			);
		}

		return $ul;
	}
}
?>
