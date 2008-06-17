<?php
/**
 * Oedipus_LoginPage
 *
 * @copyright 2008-04-10, Clear Line Web Design
 */

class
	Oedipus_LoginPage
extends
	Oedipus_HTMLPage
{
	public static function
		get_fields()
	{
		return explode(' ', 'login');
	}
	
	public static function
		reset_session_values()
	{
		$fields = self::get_fields();
		
		if (!isset($_SESSION['values'])) {
			foreach ($fields as $field) {
				$_SESSION['values'][$field] = '';
			}
		}
	}
	
	public static function
		reset_session_errors()
	{
		$fields = self::get_fields();

		if (!isset($_SESSION['errors'])) {
			foreach ($fields as $field) {
				$_SESSION['errors'][$field]['class'] = 'hidden';
				$_SESSION['errors'][$field]['message'] = '';
			}
		}		
	}
	
	public static function
		reset_session_form()
	{
		self::reset_session_values();
		self::reset_session_errors();		
	}
	
	public function
		send_http_headers()
	{
		#session_start();
		parent::send_http_headers();
		
		self::reset_session_form();
	}
	
	public function
		render_head_script_javascript()
	{
		parent::render_head_script_javascript();

		HTMLTags_ScriptRenderer
			::render_external_js_script('/scripts/login-form.js');
		HTMLTags_ScriptRenderer
			::render_external_js_script('/haddock/public-html/public-html/scripts/ajax-form.js');
	}
	
	public function
		content()
	{
		#print_r($_SESSION);
		
?>
<h2>Log In to <em>Oedipus: Decision Maker</em></h2>
<?php
DBPages_PageRenderer::render_page_section('log-in', 'general-explanation');

$log_in_redirect_script_url = Oedipus_LogInHelper::get_log_in_redirect_script_url();
?>
<form
	id="basic-form"
	name="frmRegistration"
	method="post"
	action="<?php echo $log_in_redirect_script_url->get_as_string(); ?>"
>
	<fieldset>
		<legend class="txtFormLegend">Your Details</legend>
	<ol>
	<li>
			<!-- Email address -->
			<label for="email">Your Email:</label>
			<input
				id="email"
				name="email"
				type="text"
				value="<?php echo $_SESSION['values']['email'] ?>"
			/>
			<span
				id="email_failed"
				class="<?php echo $_SESSION['errors']['email']['class']; ?>"
			><?php echo $_SESSION['errors']['email']['message']; ?></span>
	</li>
	<li>
			<!-- Password -->
			<label for="password">Password:</label>
			<input
				id="password"
				name="password"
				type="password"
				value=""
			/>
			<span
				id="login_failed"
				class="<?php echo $_SESSION['errors']['login']['class']; ?>"
			><?php echo $_SESSION['errors']['login']['message']; ?></span>
	</li>
	</ol>
	</fieldset>
	<div class="submit_buttons_div">
		<input
			type="submit"
			name="submitbutton"
			value="Log in" 
			class="left button"
		/>
	</div>
</form>
<?php
/*
 * Link to reset the password.
 */
$prp_url = new HTMLTags_URL();

$prp_url->set_file('/haddock/public-html/public-html/index.php');

$prp_url->set_get_variable('oo-page');
$prp_url->set_get_variable('page-class', 'Oedipus_PasswordResetPage');

if (isset($_SESSION['values']['email'])) {
	$prp_url->set_get_variable('email', urlencode($_SESSION['values']['email']));
}

?>
<ul>
	<li>
		<a href="<?php echo $prp_url->get_as_string(); ?>">Forgotten your password?</a>
	</li>
</ul>
<?php
	}
	
	#public function
	#	render_body_tag_open()
	#{
	#	echo '<body onload="setFocus();">' . "\n";
	#}
}
?>
