<?php
/**
 * Oedipus_TableRenderer
 *
 * @copyright RFI, 2008-02-18
 */

class
	Oedipus_TableRenderer
{
	public static function
		render_oedipus_html_table(Oedipus_Table $table)
	{
		return new Oedipus_OedipusHTMLTable($table);
	}
}
?>
