<?php
/**
 * Oedipus_DramaHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-11
 */

class
Oedipus_DramaHelper
{
	// ------------
	// URLS
	// ------------

	public static function
		get_drama_url(Oedipus_Drama $drama = NULL)
	{
		if ($drama == NULL)
		{
			return PublicHTML_URLHelper
				::get_oo_page_url('Oedipus_DramaPage');
		}
		else
		{
			$url = new HTMLTags_URL();
			$url->set_file('/dramas/'. $drama->get_unique_name());
//                        $url->set_get_variable('oo-page', 1);
//                        $url->set_get_variable('page-class', 'Oedipus_DramaEditorPage');

//                        $url->set_get_variable('drama_unique_name', );

			return $url;
		}
	}

}
?>
