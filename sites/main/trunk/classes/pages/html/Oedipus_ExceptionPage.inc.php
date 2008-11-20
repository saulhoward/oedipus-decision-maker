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
		echo <<<HTML
<h2>Oedipus Error</h2>
HTML;

		PublicHTML_ExceptionRenderer::render_exception_div_from_session();

                /*
		 * Fail Picture
                 */
		echo <<<HTML
<img 
	src="/images/art/caravaggio-salome.jpg" 
	class="exception-art" 
	alt="Salome with the Head of John the Baptist (Caravaggio, London)" 
/>
HTML;
	}
}
?>
