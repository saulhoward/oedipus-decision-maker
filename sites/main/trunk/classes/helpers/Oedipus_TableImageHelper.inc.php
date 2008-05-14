<?php
/**
 * Oedipus_TableImageHelper
 *
 * @copyright RFI, 2008-02-18
 * @copyright SANH, 2008-04-24
 */

class
Oedipus_TableImageHelper
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
}
?>
