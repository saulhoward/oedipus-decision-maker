<?php
/**
 * Oedipus_TablePNGImage
 *
 * @copyright 2008-05-15, SANH
 *
 * Creates a PNG of an Oedipus Table
 *
 */

class
Oedipus_TablePNGImage
extends
Oedipus_GDPNGImage
{
	# The Oedipus_Table
	private $table;

	# The GD Image
	private $image;

	# GD Image attributes
	private $font;
	private $padding;
	private $font_color;
	private $font_shadow_color;
	private $padding_color;
	private $background_color;
	private $table_background_color;

	public function
		render()
	{
		if (isset($_GET['table_id']))
		{
			$this->table =
				Oedipus_TableCreationHelper::get_oedipus_table_by_id($_GET['table_id']);
			$this->set_oedipus_table_image();
		}

		if (isset($this->image))
		{
			imagepng($this->image);
			imagedestroy($this->image);
		}
	}

	private function
		set_oedipus_table_image()
	{
		// Find the Size of table and image
		// width = label + (1 X no_of_actors) + 1 for si
		// height = 1 for header + (1 x no_of_actors)
		$label_width = 200;
		$label_height = 50;
		$no_of_actors = $this->get_no_of_actors();

		$table_width = $label_width + (100 * $no_of_actors) + 100;
		$table_height = ($label_height * $no_of_actors) + 100;
		$table_name_label_height = 50;

		$this->set_padding();
		$image_width = $table_width + ($this->padding * 2);
		$image_height = $table_name_label_height + $table_height + ($this->padding * 2);

		// Set the image and the colors
		$this->image = imagecreatetruecolor($image_width, $image_height);
		$this->set_colors();
		$this->set_font();

		// fill image with background color
		imagefill($this->image, 0, 0, $this->background_color);

		//  imagefilledellipse($this->image, 400, 300, 400, 300, $red);
		//  $this->gradient_region(10, 10, 200, 200, $this->font_color, $this->padding_color);

		// Set the table name label
		$this->set_table_name_label();

		// Draw a box for the table
		imagefilledrectangle($this->image,
			$this->padding, $this->padding + $table_name_label_height,        
			$table_width + $this->padding, $table_height + $this->padding + $table_name_label_height,
			$this->table_background_color
		);
	}

	private function
		set_colors()
	{
		// define some colors
		$red = imagecolorallocate($this->image, 255, 0, 0);
		$white = imagecolorallocate($this->image,255,255,255);
		$black = imagecolorallocate($this->image,0,0,0);
		$lightgrey = imagecolorallocate($this->image, 200, 200, 200);
		$grey = imagecolorallocate($this->image,100,100,100);
		$yellow = imagecolorallocate($this->image, 0xFF, 0xFF, 0x00);

		// attribute colors
		$this->font_color =  $black;
		$this->font_shadow_color =  $grey;
		$this->padding_color =  $lightgrey;
		$this->background_color =  $yellow;
		$this->table_background_color =  $lightgrey;
	}

	private function
		set_padding()
	{
		$this->padding = 10;
	}

	private function
		set_font()
	{
		$this->font = PROJECT_ROOT . '/project-specific/public-html/fonts/Vera.ttf';
	}

	private function
		set_table_name_label()
	{
		// The text to draw
		$text = $this->table->get_name();
		// Replace path by your own font path

		$table_name_label_height = 30;
		// Add the text
//                imagepstext(
		imagettftext(
			$this->image,
			20, 0,
			$this->padding, $this->padding + $table_name_label_height,
			$this->font_color,
			$this->font, 
			$text
		);

	}

	private function
		get_no_of_actors()
	{
		return count($this->table->get_actors());
	}

	// Image files for overlaying, etc.
	private function
		get_oedipus_logo_image()
	{
		return $this->load_png(
			PROJECT_ROOT 
			. "/project-specific/public-html/images/oedipus-logo-with-head.png"
		);
	}

	// Gradient function from php.net
	// The image must be in truecolor mode!!
	private function 
		gradient_region(
			$x, $y, $width, $height,$src_color, $dest_color=0
		)
	{
		$src_alpha = ($src_color) >> 24;
		$src_red = ($src_color & 0xFF0000) >> 16;
		$src_green = ($src_color & 0x00FF00) >> 8;
		$src_blue = ($src_color & 0x0000FF);

		$dest_alpha = ($dest_color) >> 24;
		$dest_red = ($dest_color & 0xFF0000) >> 16;
		$dest_green = ($dest_color & 0x00FF00) >> 8;
		$dest_blue = ($dest_color & 0x0000FF);


		$inc_alpha = ($dest_alpha - $src_alpha) / $width;
		$inc_red = ($dest_red - $src_red)/$width;
		$inc_green = ($dest_green - $src_green)/$width;
		$inc_blue = ($dest_blue - $src_blue)/$width;

		// If you need more performance, the step can be increased
		for ($i=0;$i<$width;$i++){
			$src_alpha += $inc_alpha;
			$src_blue += $inc_blue;
			$src_green += $inc_green;
			$src_red += $inc_red;
			imagefilledrectangle($this->image,
				$x+$i,$y,        
				$x+$i,$y+$height,
				imagecolorallocatealpha($this->image,
				$src_red,$src_green,$src_blue,$src_alpha));
		}
	}
}
?>
