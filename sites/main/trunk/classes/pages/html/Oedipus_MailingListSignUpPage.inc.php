<?php
/**
 * Oedipus_MailingListSignUpPage
 *
 * @copyright 2008-03-30, RFI
 */

class
	Oedipus_MailingListSignUpPage
extends
	Oedipus_HTMLPage
{
	public function
		content()
	{
		MailingList_SignUpRenderer::render_body_div_email_adding();
	}
}
?>