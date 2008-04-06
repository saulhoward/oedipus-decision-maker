<?php
/**
 * Oedipus_TableCreatorPage
 *
 * @copyright 2008-03-30, RFI
 */

class
	Oedipus_TableCreatorPage
extends
	Oedipus_HTMLPage
{
	public function
		content()
	{
		DBPages_PageRenderer::render_page_section('table-creator', 'instructions');

		if (isset($_GET['table_values']))
		{
			$table = Oedipus_TableCreatorHelper::create_oedipus_table_from_get($_GET);
		}
		else
		{
			$table = Oedipus_TableCreatorHelper::get_default_oedipus_table();
		}

		$table_creator_page_div = Oedipus_TableCreatorHelper::render_oedipus_table_creator_page_div($table);
		echo $table_creator_page_div->get_as_string();
	}

}
?>
