<?php
/**
 * Oedipus_DramasHelper
 *
 * @copyright 2008-04-29, RFI & SANH
 */

class
	Oedipus_DramasHelper
{
	/*
	 * ----------------------------------------
	 * Functions to do with rendering HTML
	 * ----------------------------------------
	 */
	
	public static function
		render_link_back_to_drama_view_page_p(
			Oedipus_Drama $drama,
			$link_text = 'Return to drama'
		)
	{
		$drama_view_page_url = $drama->get_view_page_url();
		
?>
<p class="link_back">
	<a href="<?php echo $drama_view_page_url->get_as_string(); ?>">
		<?php echo $link_text; ?>
	</a>
</p>
<?php
	}
	
	/*
	 * ----------------------------------------
	 * Functions to do with URLs
	 * ----------------------------------------
	 */
	
	public static function
		get_view_page_url(
			Oedipus_Drama $drama = NULL
		)
	{
		if (isset($drama)) {
#			$url = new HTMLTags_URL();
#			$url->set_file('/dramas/'. $drama->get_unique_name());
#//                        $url->set_get_variable('oo-page', 1);
#//                        $url->set_get_variable('page-class', 'Oedipus_DramaEditorPage');
#
#//                        $url->set_get_variable('drama_unique_name', );
			
			return PublicHTML_URLHelper
				::get_oo_page_url(
					'Oedipus_DramaPage',
					array(
						'drama_id' => $drama->get_id()
					)
				);
			
			return $url;
		} else {
			return PublicHTML_URLHelper
				::get_oo_page_url('Oedipus_DramaPage');
		}
	}
}
?>