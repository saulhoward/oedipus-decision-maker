<?php
/**
 * Oedipus_RSSHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-11
 */

class
	Oedipus_RSSHelper
{
	public static function
		get_google_code_rss_div()
	{
		$div = new HTMLTags_Div();
		$div->set_attribute_str('class', 'rss');
		$div->append('<h3>Project Code Changes</h3>');

		try
		{
			$rss = new RSS_RSS(
				'http://code.google.com/feeds/p/oedipus-decision-maker/updates/basic',
				'atom'
			);
		}
		catch (Exception $e) // RSS_RSS constructor failed
		{
			$rss = NULL;
			//throw new Exception ('Google Code RSS_RSS object creation failed');
		}
		if ($rss)
		{

			$div->append(RSS_RSSHelper::get_rss_titles_ul($rss));

		}
		else
		{
			$div->append('<p class="error">RSS feed not found</p>');
		}
		return $div;
	}

}
?>
