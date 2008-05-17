<?php
/**
 * Oedipus_TablePNGImage
 *
 * @copyright 2008-05-15, SANH
 *
 * Creates a PNG of an Oedipus Table
 * Uses the GD library,
 * and PostScript fonts
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
	private $label_width;
	private $label_height;
	private $label_indent_width;
	private $table_width;
	private $table_height;
	private $column_width;
	private $table_name_label_height;
	private $font_size;
	private $font_color;
	private $font_shadow_color;
	private $padding_color;
	private $background_color;
	private $table_background_color;
	private $stated_intention_background_color;

	public function
		render()
	{
		if (isset($_GET['table_id']))
		{
			$this->table =
				Oedipus_TableCreationHelper::get_oedipus_table_by_id($_GET['table_id']);

			$this->set_padding(10);
			$this->set_label_width_and_height(200, 50);
			$this->set_label_indent_width(10);
			$this->set_table_name_label_height(50);
			$this->set_column_width(50);
			$this->set_font('caslon.pfb');
			$this->set_font_size(16);
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
		$this->set_table_height_and_width();

		$image_width = $this->table_width + ($this->padding * 2);
		$image_height = $this->table_name_label_height + $this->table_height + ($this->padding * 2);

		// Set the image and the colors
		$this->image = imagecreatetruecolor($image_width, $image_height);
		$this->set_colors();

		// fill image with background color
		imagefill($this->image, 0, 0, $this->background_color);

		// Set the table name label
		$this->draw_table_name_label();

		// Draw a box for the table
		imagefilledrectangle($this->image,
			$this->padding, $this->padding + $this->table_name_label_height,        
			$this->table_width + $this->padding,
		       	$this->table_height + $this->padding + $this->table_name_label_height,
			$this->table_background_color
		);

		// Draw the Column headings and backgrounds
		$this->draw_column_headings_and_backgrounds();

		// Draw the option labels and tiles
		$this->draw_option_labels_and_tiles();

	}

	private function
		draw_option_labels_and_tiles()
	{
		// Foreach option, 
		// write the actors name if this is his/her first option
		// write the option label,
		// and put in a tile for all actors and one for the s.i.

		$x = 0;
		$y = 0;
		foreach ($this->table->get_actors() as $actor)
		{
			if ($actor->has_options())
			{
				$first = TRUE;
				foreach ($actor->get_options() as $option)
				{
					if ($first)
					{
						//put the x,y in the first column
						$x = $this->padding;
						$y = $this->padding + $this->table_name_label_height + $this->label_height;

						//print the actors name
						$this->draw_option_label($actor->get_name(), $x, $y);

						// move onto the next row
						$y += $this->label_height;

						$first = FALSE;
					}

					//indent x
					$x += $this->label_indent_width;
					//print the options label
					$this->draw_option_label($option->get_name(), $x, $y);

					//move x to the first actor
					$x = $this->padding + $this->label_width;

					foreach ($this->table->get_actors() as $position_actor)
					{
						$position = $option->get_position($position_actor->get_id());

						//draw the tile
						$this->draw_position_tile($position, $position_actor, $x, $y);

						// advance x
						$x += $this->column_width;
					}

					$stated_intention = $option->get_stated_intention();
					//draw the tile
					$this->draw_stated_intention_tile($stated_intention, $actor, $x, $y);

					// move onto the next row
					$y += $this->label_height;
					// reset x to the beginning of the line
					$x = $this->padding;
				}
			}
		}
	}

	private function
		draw_option_label($label_text, $x, $y)
	{
		imagepstext(
			$this->image,
			$label_text, 
			$this->font, 
			$this->font_size, 
			$this->font_color,
			$this->table_background_color,
			$x, $y
		);
	}

	private function
		draw_position_tile($position, $position_actor, $x, $y)
	{
		$position_position= $position->get_tile();
		switch ($position_position)
		{
			case '1':
				$position_filename_part = '_filled';
				break;
			case '0':
			default:
				$position_filename_part = '_empty';
		}

		$position_doubt= $position->get_doubt();
		switch ($position_doubt)
		{
			case '?':
				$doubt_filename_part = '_question';
				break;
			case 'x':
				$doubt_filename_part = '_x';
				break;
			case '':
			default:
				$doubt_filename_part = '';
		}

//                print_r(
//                        "/project-specific/public-html/images/position-tiles/40px-png/squares/"
//                        . $position_actor->get_color()
//                        . $position_filename_part
//                        . $doubt_filename_part
//                );exit;

		$tile = $this->load_png(
			PROJECT_ROOT 
			. "/project-specific/public-html/images/position-tiles/40px-png/squares/"
			. $position_actor->get_color()
			. $position_filename_part
			. $doubt_filename_part
			. '.png'
		);

		imagecopy($this->image, $tile, $x, $y, 0, 0, 40, 40);
	}

	private function
		draw_stated_intention_tile(Oedipus_StatedIntention $stated_intention, Oedipus_Actor $actor, $x, $y)
	{
		$stated_intention_position= $stated_intention->get_tile();
		switch ($stated_intention_position)
		{
			case '1':
				$position_filename_part = '_filled';
				break;
			case '0':
			default:
				$position_filename_part = '_empty';
		}

		$stated_intention_doubt= $stated_intention->get_doubt();
		switch ($stated_intention_doubt)
		{
			case '?':
				$doubt_filename_part = '_question';
				break;
			case 'x':
				$doubt_filename_part = '_x';
				break;
			case '':
			default:
				$doubt_filename_part = '';
		}

//                print_r(
//                        "/project-specific/public-html/images/position-tiles/40px-png/squares/"
//                        . $position_actor->get_color()
//                        . $position_filename_part
//                        . $doubt_filename_part
//                );exit;

		$tile = $this->load_png(
			PROJECT_ROOT 
			. "/project-specific/public-html/images/position-tiles/40px-png/diamonds/"
			. $actor->get_color()
			. $position_filename_part
			. $doubt_filename_part
			. '.png'
		);

		imagecopy($this->image, $tile, $x, $y, 0, 0, 50, 50);
	}

	private function
		set_table_height_and_width()
	{
		// Find the Size of table and image
		// width = label + (1 X no_of_actors) + 1 for si
		// height = 1 for header + (1 x no_of_actors)
		$no_of_actors = $this->get_no_of_actors();

		$this->table_width = $this->label_width + ($this->column_width * $no_of_actors) + 100;
		$this->table_height = ($this->label_height * $no_of_actors) + 100;
	}

	private function
		draw_column_headings_and_backgrounds()
	{
		$x = 0;
		$y = 0;
		$first = TRUE;

		// go through the actors
		foreach ($this->table->get_actors() as $actor)
		{
			if ($first)
			{
				//put the x,y in the first column
				$x = $this->padding + $this->label_width;
				$y = $this->padding + $this->table_name_label_height;
			}

			// Write the heading label 
			$this->draw_heading_label_for_actor($actor, $x, $y);

			// Draw a box for the column background
			imagefilledrectangle(
				$this->image,
				$x, $y,        
				$x + $this->column_width, $y + $this->table_height,
				$this->get_actors_background_color($actor)
			);

			// advance x to the next column
			$x += $this->column_width;
			$first = FALSE;
		}

		// Write the s.i. label 
		$this->draw_heading_label_for_stated_intention('S.I.', $x, $y);

		// draw the s.i. column background 
		imagefilledrectangle(
				$this->image,
				$x, $y,        
				$x + $this->column_width, $y + $this->table_height,
				$this->stated_intention_background_color
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
		$this->stated_intention_background_color =  $black;
	}

	private function
		get_actors_background_color(Oedipus_Actor $actor)
	{
		// define some colors
		$red = imagecolorallocate($this->image, 255, 0, 0);
		$blue = imagecolorallocate($this->image, 0, 0, 255);
		$white = imagecolorallocate($this->image,255,255,255);
		$black = imagecolorallocate($this->image,0,0,0);
		$lightgrey = imagecolorallocate($this->image, 200, 200, 200);
		$grey = imagecolorallocate($this->image,100,100,100);
		$yellow = imagecolorallocate($this->image, 0xFF, 0xFF, 0x00);

		$color = $actor->get_color();
		switch ($color)
		{
			case 'red':
				return $red;
			case 'blue':
				return $blue;
			default:
				return $red;
		}
	}

	private function
		set_label_width_and_height($width = 200, $height = 50)
	{
		$this->label_width = $width;
		$this->label_height = $height;
	}

	private function
		set_label_indent_width($amount = 10)
	{
		$this->label_indent_width = $amount;
	}

	private function
		set_font_size($pixels = 12)
	{
		$this->font_size = $pixels;
	}

	private function
		set_table_name_label_height($amount = 50)
	{
		$this->table_name_label_height = $amount;
	}

	private function
		set_column_width($amount = 50)
	{
		$this->column_width = $amount;
	}

	private function
		set_padding($amount = 10)
	{
		$this->padding = $amount;
	}

	private function
		set_font($font_name = 'caslon.pfb')
	{
		$this->font = imagepsloadfont(PROJECT_ROOT . '/project-specific/public-html/fonts/' . $font_name);
	}

	private function
		draw_heading_label_for_actor($actor, $x, $y)
	{
		$actor_background_color = $this->get_actors_background_color($actor);

		imagepstext(
			$this->image,
			$actor->get_short_name(), 
			$this->font, 
			$this->font_size, 
			$this->font_color,
			$actor_background_color,
			$x, $y
		);
	}

	private function
		draw_heading_label_for_stated_intention($label_text, $x, $y)
	{
		imagepstext(
			$this->image,
			$label_text, 
			$this->font, 
			$this->font_size, 
			$this->font_color,
			$this->stated_intention_background_color,
			$x, $y
		);
	}

	private function
		draw_table_name_label()
	{
		// The text to draw
		$text = $this->table->get_name();

		// Add the text
		imagepstext (
			$this->image,
			$text,
			$this->font, 
			$this->font_size, 
			$this->font_color,
			$this->background_color,
			$this->padding, $this->table_name_label_height - $this->padding
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
