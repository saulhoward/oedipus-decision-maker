<?php

class
	Oedipus_RegisterPage
extends
	Oedipus_HTMLPage
{
	public static function
		get_fields()
	{
		return explode(' ', 'email first_name last_name password password_confirmation check_newsletter');
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
		session_start();
		self::reset_session_form();
	}
	
	public function
		render_head_script_javascript()
	{
		parent::render_head_script_javascript();
?>
<script
	type="text/javascript"
	src="/project-specific/public-html/scripts/register-form.js"
></script>
<script
	type="text/javascript"
	src="/haddock/public-html/public-html/scripts/ajax-form.js"
></script>
<?php
	}
	
	public function
		content()
	{
?>
<h2>Join <em>Oedipus: Decision Maker</em></h2>
<?php
//echo DBPages_SPoE
//        ::get_filtered_page_section(
//                'register',
//                'content-explanation'
//        );
?>
	<form
		id="basic-form"
		name="frmRegistration"
		method="post"
		action="/haddock/public-html/public-html/index.php?oo-page=1&page-class=Oedipus_RegistrationValidator&attempt_submit=1"
	>

<fieldset>
	<legend class="txtFormLegend">Your Details</legend>
		<!-- Email address -->
<ol>
<li>
		<label for="email">Your Email:</label>
		<input
			id="email"
			name="email"
			type="text"
			onblur="validate(this.value, this.id)"
			value="<?php echo $_SESSION['values']['email'] ?>"
		/>
		<span
			id="email_failed"
			class="<?php echo $_SESSION['errors']['email']['class']; ?>"
		><?php echo $_SESSION['errors']['email']['message']; ?></span>
		
</li>
<li>
		<!-- First Name -->
		<label for="first_name">First name:</label>
		<input
			id="first_name"
			name="first_name"
			type="text" 
			onblur="validate(this.value, this.id)" 
			value="<?php echo $_SESSION['values']['first_name'] ?>"
		/>
        <span
			id="first_name_failed"
			class="<?php echo $_SESSION['errors']['first_name']['class']; ?>"
		><?php echo $_SESSION['errors']['first_name']['message']; ?></span>
</li>
<li>
        <!-- Last Name -->
        <label for="last_name">Last name:</label>
        <input
			id="last_name"
			name="last_name"
			type="text"
            onblur="validate(this.value, this.id)" 
            value="<?php echo $_SESSION['values']['last_name'] ?>"
		/>
		<span
			id="last_name_failed"
			class="<?php echo $_SESSION['errors']['last_name']['class']; ?>"
		><?php echo $_SESSION['errors']['last_name']['message']; ?></span>
</li>
</ol>
</fieldset>
<fieldset>

	<legend class="txtFormLegend">Password</legend>
<ol>
<li>
        <!-- Password -->
        <label for="password">Password:</label>
        <input
			id="password"
			name="password"
			type="password"
            onblur="validate(this.value, this.id)" 
            value=""
		/>
		<span
			id="password_failed"
			class="<?php echo $_SESSION['errors']['password']['class']; ?>"
		><?php echo $_SESSION['errors']['password']['message']; ?></span>
</li>
<li>
        <!-- Password Confirmation -->
        <label for="password_confirmation">Password again:</label>
        <input
			id="password_confirmation"
			name="password_confirmation"
			type="password"
            onblur="validate(this.value, this.id)" 
            value=""
		/>
		<span
			id="password_confirmation_failed"
			class="<?php echo $_SESSION['errors']['password_confirmation']['class']; ?>"
		><?php echo $_SESSION['errors']['password_confirmation']['message']; ?></span>
</li>
</ol>
</fieldset>
<fieldset>
	<legend class="txtFormLegend">Extras</legend>
	<ol>
		<li>
			<!-- Newsletter checkbox -->
			<input
				type="checkbox"
				class="checkbox"
				id="check_newsletter"
				name="check_newsletter" 
				class="left" 
				onblur="validate(this.checked, this.id)"
				onclick="validate(this.checked, this.id)" 
<?php
	if ($_SESSION['values']['check_newsletter'] == 'on') {
        echo 'checked="checked"';
	}
?>
			/>I would like to join the Mailing List.
			<span
				id="check_newsletter_failed"
				class="<?php echo $_SESSION['errors']['check_newsletter']['class']; ?>"
			><?php echo $_SESSION['errors']['check_newsletter']['message']; ?></span>
		</li>
	</ol>
</fieldset>
	<!-- End of form -->
<div class="submit_buttons_div">
	<input
		type="submit"
		name="submitbutton"
		value="Register" 
		class="left button"
	/>
</div>
	<p class="txtSmall left">Note: All fields are required.</p>
</form>
<?php
	}
	
	public function
		render_body_tag_open()
	{
		echo '<body onload="setFocus();">' . "\n";
	}
}
?>
