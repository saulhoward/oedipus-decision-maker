<?php
/**
 * Play4ATeam_HTMLPageWithAccountStatus
 *
 * @copyright 2008-04-11, Clear Line Web Design
 */

abstract class
	Oedipus_HTMLPageWithAccountStatus
extends
	Oedipus_HTMLPage
{
	#public function
	#	render_body()
	#{
	#	echo "<body>\n";
	#	
	#	$this->render_body_div_header();
	#	
	#	$this->render_body_div_account_status();
	#	
	#	
	#	$this->render_body_div_navigation();
	#	$this->render_body_div_content();
	#	
	#	$this->render_body_div_banner_ads();
	#	
	#	$this->render_body_div_footer();
	#	
	#	echo "</body>\n";
	#}
	
/*	public function
		render_body_div_account_status()
	{
		echo '<div id="account_status">' . "\n";
		
		if (isset($_SESSION['logged-in-id'])) {
			$this->log_in($_SESSION['logged-in-id']);
			
			echo '<a href="/Play4ATeam_MemberPage">';
			echo $this->email;
			echo '</a>';
			
			echo "\n";
?>
<a href="/Play4ATeam_LogOutRequest">Log out</a>
<?php
		} else {
?>
<a href="/Play4ATeam_RegisterPage">Sign up!</a>
&nbsp;
<a href="/Play4ATeam_LoginPage">Log in</a>
<?php
		}
		
		echo '</div>' . "\n";
	}*/	
}
?>
