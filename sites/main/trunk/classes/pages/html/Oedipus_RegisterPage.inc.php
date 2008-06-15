<?php

class
	Oedipus_RegisterPage
extends
	Oedipus_HTMLPage
{
	public static function
		get_fields()
	{
		return explode(' ', 'email first_name last_name password password_confirmation check_read_terms check_age check_newsletter');
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
<h2>Join <em>play4ateam</em></h2>
<?php
//echo DBPages_SPoE
//        ::get_filtered_page_section(
//                'register',
//                'content-explanation'
//        );
?>
	<form
		name="frmRegistration"
		method="post"
		action="/haddock/public-html/public-html/index.php?oo-page=1&page-class=Oedipus_RegistrationValidator&attempt_submit=1"
	>

	<p class="form-title" id="user-add">Join <em>Oedipus: Decision Maker</em></legend>
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
	<legend class="txtFormLegend">Terms of Use</legend>
	<ol>
		<li>
			<!-- Read terms checkbox -->
			<input
				type="checkbox"
				id="check_read_terms"
				name="check_read_terms" 
				class="left" 
				onblur="validate(this.checked, this.id)"
				onclick="validate(this.checked, this.id)" 
<?php
	if ($_SESSION['values']['check_read_terms'] == 'on') {
        echo 'checked="checked"';
	}
?>
			/>I have read the
				<a
					href="/files/Play4ateam_Website_Terms_and_Conditions.pdf"
					target="_blank"
				>Terms of Use</a>
				and the
				<a
					href="/files/Play4ateam_Privacy_policy.pdf"
					target="_blank"
				>Privacy Policy</a>
			<span
				id="check_read_terms_failed"
				class="<?php echo $_SESSION['errors']['check_read_terms']['class']; ?>"
			><?php echo $_SESSION['errors']['check_read_terms']['message']; ?></span>
			
	</li>
	<li>
			<!-- Age checkbox -->
			<input
				type="checkbox"
				id="check_age"
				name="check_age" 
				class="left" 
				onblur="validate(this.checked, this.id)"
				onclick="validate(this.checked, this.id)" 
<?php
	if ($_SESSION['values']['check_age'] == 'on') {
        echo 'checked="checked"';
	}
?>
			/>I am aged 16 years or older.
			<span
				id="check_age_failed"
				class="<?php echo $_SESSION['errors']['check_age']['class']; ?>"
			><?php echo $_SESSION['errors']['check_age']['message']; ?></span>
		</li>
		<li>
			<!-- Newsletter checkbox -->
			<input
				type="checkbox"
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
			/>I would like to receive a monthly newsletter from play4ateam.com with the latest offers, advice and sporting features.
			<span
				id="check_newsletter_failed"
				class="<?php echo $_SESSION['errors']['check_newsletter']['class']; ?>"
			><?php echo $_SESSION['errors']['check_newsletter']['message']; ?></span>
		</li>
	</ol>
	<!-- End of form -->
	<input
		type="submit"
		name="submitbutton"
		value="Register" 
		class="left button"
	/>
</fieldset>
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
