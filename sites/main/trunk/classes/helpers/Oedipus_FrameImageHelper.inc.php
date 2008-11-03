<?php
/**
 * Oedipus_FrameImageHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-24
 */

class
Oedipus_FrameImageHelper
{
	public function make_image()
	{
		header("Content-Type: image/png");

		// Make main rectangle
		// width = label + (1 X no_of_actors) + 1 for si
		// height = 1 for header + (1 x no_of_actors)
		//

		$img = load_png("/images/logo.png");
		imagepng($img);
		imagedestroy($img);
	}

	public function copy_image($url,$logo)
	{
		$bwidth  = imagesx($url);
		$bheight = imagesy($url);
		$lwidth  = imagesx($logo);
		$lheight = imagesy($logo);
		$src_x = $bwidth - ($lwidth + 5);
		$src_y = $bheight - ($lheight + 5);
		ImageAlphaBlending($url, true);
		ImageCopy($url,$logo,$src_x,$src_y,0,0,$lwidth,$lheight);
	}

	public function load_png($imgname)
	{
		$im = @imagecreatefrompng($imgname); /* Attempt to open */
		if (!$im) { /* See if it failed */
			$im  = imagecreatetruecolor(150, 30); /* Create a blank image */
			$bgc = imagecolorallocate($im, 255, 255, 255);
			$tc  = imagecolorallocate($im, 0, 0, 0);
			imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
			/* Output an errmsg */
			imagestring($im, 1, 5, 5, "Error loading $imgname", $tc);
		}
		return $im;
	}

	public function
	       get_frame_png_url($frame_id)
	{
	               $url = new HTMLTags_URL();
	               $url->set_file('/frames/images/frame-'. $frame_id . '.png');
	               return $url;
	}

	public static function
		get_frame_png_thumbnail_img(
			Oedipus_Frame $frame,
			$max_width = 250,
			$max_height = 185
		)
	{
		$url = new HTMLTags_URL();
		$url->set_file(
			'/frames/images/thumbnails/frame-'
			. $frame->get_id()
			. '_' . $max_width . 'x' . $max_height . '.png'
		);
		
		$img = new HTMLTags_IMG();
		
		$img->set_src($url);
		$img->set_alt($frame->get_name());
		
		return $img;
	}

	public static function
		get_frame_png_thumbnail_img_a(
			Oedipus_Frame $frame,
			$max_width = 250,
			$max_height = 185
		)
	{
		$url = Oedipus_DramaHelper
			::get_drama_page_url_for_scene_id($frame->get_scene_id());
		
		$a = new HTMLTags_A();
		$a->set_href($url);
		$a->set_attribute_str('title', 'View this Drama');
		
		$img = self::get_frame_png_thumbnail_img($frame, $max_width, $max_height);

		$a->append_tag_to_content($img);
		
		return $a;
	}
}
?>
