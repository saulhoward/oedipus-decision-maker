<?php
/**
 * Oedipus_FramePNGImage
 *
 * @copyright 2008-05-15, SANH
 *
 * Creates a PNG of an Oedipus frame
 * Uses the GD library,
 * and PostScript fonts
 *
 */

class
Oedipus_FramePNGImage
extends
Oedipus_GDPNGImage
{
	# The Oedipus_frame
	private $frame;

	private $no_of_options;
	private $no_of_characters_with_options;

	# The GD Image
	private $image;

	# GD Image attributes
	private $image_width;
	private $image_height;
	private $font;
	private $stated_intention_font;
	private $character_name_font;
	private $frame_name_font;
	private $padding;
	private $label_width;
	private $label_height;
	private $label_indent_width;
	private $frame_padding;
	private $frame_width;
	private $frame_height;
	private $column_width;
	private $column_label_padding;
	private $frame_name_label_height;
	private $font_size;
	private $font_color;
	private $font_shadow_color;
	private $padding_color;
	private $background_color;
	private $frame_background_color;
	private $stated_intention_background_color;

	public function
		render()
	{
		if (isset($_GET['frame_id']))
		{
			// get the Oedipus_frame
			$this->frame =
				Oedipus_FrameHelper::get_frame_by_id($_GET['frame_id']);

			// Set all of the styles and padding
			$this->set_font('caslon.pfb');
			$this->set_stated_intenion_font('caslon-italic.pfb');
			$this->set_character_name_font('caslon-small-caps.pfb');
			$this->set_frame_name_font('caslon-italic.pfb');

			$this->set_font_size(17);

			$this->set_padding(10);
			$this->set_frame_padding(10);

			$this->set_label_indent_width(10);
			$this->set_column_label_padding(5);
			$this->set_frame_name_label_height(50);
			$this->set_column_width(56);

			$this->set_label_width_and_height();

			// Set the GD image object
			$this->set_oedipus_frame_image();
		}

		if (
			isset($_GET['thumbnail'])
			&&
			isset($_GET['max_width'])
			&&
			isset($_GET['max_height'])
		)
		{
			// If it's a thumbnail, resize the whole image
			$this->set_thumbnail_image(
				$_GET['max_width'],
				$_GET['max_height']
			);

		}
		if (isset($this->image))
		{
			// Draw the image
			imagepng($this->image);
			imagedestroy($this->image);
		}
	}

	private function
		set_thumbnail_image($width, $height)
	{
		// Resample
		// Get new dimensions
		$ratio_orig = $this->image_width / $this->image_height;

		if ($width/$height > $ratio_orig) {
			$width = $height*$ratio_orig;
		} else {
			$height = $width/$ratio_orig;
		}

		//copy the image to the new size
		$image_p = imagecreatetruecolor($width, $height);
		imagecopyresampled(
			$image_p, 
			$this->image,
			0, 0, 0, 0,
			$width, $height,
			$this->image_width, $this->image_height
		);

		$this->image = $image_p;
	}

	private function
		set_oedipus_frame_image()
	{
		$this->set_frame_height_and_width();

		$this->image_width = $this->frame_width + ($this->padding * 2);
		$this->image_height = 
			$this->frame_name_label_height 
			+
			$this->frame_height 
			+
			($this->padding * 2) 
			+ 
			$this->frame_padding;

		// Set the image and the colors
		$this->image = imagecreatetruecolor($this->image_width, $this->image_height);
		$this->set_colors();

		// fill image with background color
		imagefill($this->image, 0, 0, $this->background_color);

		// Set the frame name label
		$this->draw_frame_name_label(
			$this->image_width, $this->frame_name_label_height + ($this->frame_padding * 2)
		);

		// Draw a box for the frame
		imagefilledrectangle($this->image,
			$this->padding, $this->padding + $this->frame_name_label_height,        
			$this->frame_width + $this->padding,
			$this->frame_height + $this->padding + $this->frame_name_label_height,
			$this->frame_background_color
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
		// write the characters name if this is his/her first option
		// write the option label,
		// and put in a tile for all characters and one for the s.i.

		$x = 0;
		$y = 0;
		//put the x,y in the first column
		$x = 
			$this->padding
			+
			$this->frame_padding;
		$y = 
			$this->padding 
			+ 
			$this->frame_name_label_height 
			+
			$this->label_height;


		foreach ($this->frame->get_characters() as $character)
		{
			if ($character->has_options())
			{
				$first = TRUE;
				foreach ($character->get_options() as $option)
				{
					if ($first)
					{
						//print the characters name
						$this->draw_character_label($character->get_name(), $x, $y);

						// move onto the next row
						$y += ( $this->label_height / 2 );

						$first = FALSE;
					}

					//print the options label
					$this->draw_option_label($option->get_name(), $x, $y);

					//move x to the first character
					$x = $this->padding + $this->label_width;

					foreach ($this->frame->get_characters() as $position_character)
					{
						$position = $option->get_position(
							$position_character->get_id()
						);

						//draw the tile
						$this->draw_position_tile(
							$position, $position_character, $x, $y
						);

						// advance x
						$x += $this->column_width;
					}

					$stated_intention = $option->get_stated_intention();
					//draw the tile
					$this->draw_stated_intention_tile(
						$stated_intention, $character, $x, $y
					);

					// move onto the next row
					$y += $this->label_height;
					// reset x to the beginning of the line
					$x = $this->padding + $this->frame_padding;
				}
			}
		}
	}

	private function
		draw_character_label($label_text, $x, $y)
	{
		imagepstext(
			$this->image,
			$label_text, 
			$this->character_name_font, 
			$this->font_size, 
			$this->font_color,
			$this->frame_background_color,
			$x, $y
		);
	}


	private function
		draw_option_label($label_text, $x, $y)
	{
		//indent x
		$x += $this->label_indent_width;

		imagepstext(
			$this->image,
			$label_text, 
			$this->font, 
			$this->font_size, 
			$this->font_color,
			$this->frame_background_color,
			$x, $y
		);
	}

	private function
		draw_position_tile($position, $position_character, $x, $y)
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
		//                        . $position_character->get_color()
		//                        . $position_filename_part
		//                        . $doubt_filename_part
		//                );exit;

		$tile = $this->load_png(
			PROJECT_ROOT 
			. "/project-specific/public-html/images/position-tiles/40px-png/squares/"
			. $position_character->get_color()
			. $position_filename_part
			. $doubt_filename_part
			. '.png'
		);

		/*
		 * Offset $x and $y to position tile better
		 */
		$y -= ($this->label_height / 2);
		$y += 5;
		$x += 8;

		imagecopy($this->image, $tile, $x, $y, 0, 0, 40, 40);
	}

	private function
		draw_stated_intention_tile(
			Oedipus_StatedIntention $stated_intention,
		       	Oedipus_Character $character,
		       	$x,
			$y
		)
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
		//                        . $position_character->get_color()
		//                        . $position_filename_part
		//                        . $doubt_filename_part
		//                );exit;

		$tile = $this->load_png(
			PROJECT_ROOT 
			. "/project-specific/public-html/images/position-tiles/40px-png/diamonds/"
			. $character->get_color()
			. $position_filename_part
			. $doubt_filename_part
			. '.png'
		);

		/*
		 * Offset $x and $y to position tile better
		 */
		$y -= ($this->label_height / 2);
		//                $y += 5;
		$x += 3;

		imagecopy($this->image, $tile, $x, $y, 0, 0, 50, 50);
	}

	private function
		set_frame_height_and_width()
	{
		// Find the Size of frame
		$this->set_no_of_options_and_no_of_characters_with_options();

		$this->frame_width = 
			$this->label_width 
			+ ($this->column_width * ( $this->get_no_of_characters() + 1)) 
			+ ($this->frame_padding * 2);

		$this->frame_height = 
			(
				($this->label_height * 0.8) 
				*
				($this->no_of_options + $this->no_of_characters_with_options + 1)
			);
	}

	private function
		draw_column_headings_and_backgrounds()
	{
		$x = 0;
		$y = 0;
		$first = TRUE;

		// go through the characters
		foreach ($this->frame->get_characters() as $character)
		{
			if ($first)
			{
				//put the x,y in the first column
				$x = $this->padding + $this->label_width;
				$y = $this->padding + $this->frame_name_label_height;
			}

			// Draw a box for the column background
			imagefilledrectangle(
				$this->image,
				$x, $y,        
				$x + $this->column_width, $y + $this->frame_height,
				$this->get_characters_background_color($character)
			);

			// Write the heading label 
			$this->draw_heading_label_for_character($character, $x, $y);

			// advance x to the next column
			$x += $this->column_width;
			$first = FALSE;
		}

		// draw the s.i. column background 
		imagefilledrectangle(
			$this->image,
			$x, $y,        
			$x + $this->column_width, $y + $this->frame_height,
			$this->stated_intention_background_color
		);

		// Write the s.i. label 
		$this->draw_heading_label_for_stated_intention('S.I.', $x, $y);
	}

	private function
		set_colors()
	{
		// define some colors
		//                $red = imagecolorallocate($this->image, 255, 0, 0);
		//                $white = imagecolorallocate($this->image,255,255,255);
		//                $lightgrey = imagecolorallocate($this->image, 200, 200, 200);
		//                $grey = imagecolorallocate($this->image,100,100,100);
		//                $yellow = imagecolorallocate($this->image, 0xFF, 0xFF, 0x00);

		$black = imagecolorallocate($this->image,0,0,0);
		$pale_yellow = imagecolorallocate($this->image, 255, 255, 140);
		$pale_blue = imagecolorallocate($this->image, 160, 255, 255);
		$darker_pale_blue = imagecolorallocate($this->image, 92, 255, 255);

		// attribute colors
		$this->font_color =  $black;
		$this->background_color =  $pale_yellow;
		$this->frame_background_color =  $pale_blue;
		$this->stated_intention_background_color =  $darker_pale_blue;
	}

	private function
		get_characters_background_color(Oedipus_Character $character)
	{
		// define some colors
		// These are full bright colours
		//                $red = imagecolorallocate($this->image, 255, 0, 0);
		//                $blue = imagecolorallocate($this->image, 0, 0, 255);

		// These are at 50% saturation
		$red = imagecolorallocate($this->image, 255, 128, 128);
		$blue = imagecolorallocate($this->image, 128, 128, 255);
		$green = imagecolorallocate($this->image, 128, 255, 128);
		$orange = imagecolorallocate($this->image, 255, 228, 128);

		$color = $character->get_color();
		switch ($color)
		{
		case 'red':
			return $red;
		case 'blue':
			return $blue;
		case 'green':
			return $green;
		case 'orange':
			return $orange;
		default:
			return $red;
		}
	}

	private function
		set_no_of_options_and_no_of_characters_with_options()
	{
		$count_options = 0;
		$count_characters_with_options = 0;

		// Get all options 
		foreach ($this->frame->get_characters() as $character)
		{
			if ($character->has_options())
			{
				$count_characters_with_options += 1;

				foreach ($character->get_options() as $option)
				{
					$count_options += 1;
				}
			}
		}
//                print_r("$no_of_options , $no_of_characters_with_options");exit;
		$this->no_of_options = $count_options;
		$this->no_of_characters_with_options = $count_characters_with_options;
	}

	private function
		set_label_width_and_height()
	{
		$max_text_width = 0;

		// Get all option names
		// and work out which one has
		// the longest name
		foreach ($this->frame->get_characters() as $character)
		{
			if ($character->has_options())
			{
				// Check the character's name as well
				// this only works because they both have get_name()
				$options_plus_character = $character->get_options();
				$options_plus_character[] = $character;

				foreach ($options_plus_character as $option_or_character)
				{
					///get the left lower corner and the right upper
					list($lx,$ly,$rx,$ry) =	
						imagepsbbox(
							$option_or_character->get_name(),
							$this->font,
						       	$this->font_size
						);

					// calculate the size of the text
					$text_width = $rx - $lx;
					$text_height = $ry - $ly;

					if ($text_width > $max_text_width)
					{
						$max_text_width = $text_width;
					}
				}
			}
		}
					
		// Make the width
		$this->label_width = $max_text_width 
			+ $this->label_indent_width 
			+ ( $this->frame_padding * 3 );

		// Make the height
		$label_height = $text_height + $this->frame_padding; 
		// for the icons, 50 px wide
		if ($label_height < 60)
		{
			$this->label_height = 60;
		}
		else
		{
			$this->label_height = $label_height;
		}
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
		set_frame_name_label_height($amount = 50)
	{
		$this->frame_name_label_height = $amount;
	}

	private function
		set_column_width($amount = 50)
	{
		$this->column_width = $amount;
	}

	private function
		set_column_label_padding($amount = 10)
	{
		$this->column_label_padding = $amount;
	}


	private function
		set_frame_padding($amount = 10)
	{
		$this->frame_padding = $amount;
	}

	private function
		set_padding($amount = 10)
	{
		$this->padding = $amount;
	}

	private function
		set_stated_intenion_font($font_name = 'caslon.pfb')
	{
		$this->stated_intention_font 
			= imagepsloadfont(
				PROJECT_ROOT 
				. '/project-specific/public-html/fonts/' 
				. $font_name
			);
	}

	private function
		set_frame_name_font($font_name = 'caslon.pfb')
	{
		$this->frame_name_font 
			= imagepsloadfont(
				PROJECT_ROOT 
				. '/project-specific/public-html/fonts/' 
				. $font_name
			);
	}

	private function
		set_character_name_font($font_name = 'caslon.pfb')
	{
		$this->character_name_font = 
			imagepsloadfont(
				PROJECT_ROOT 
				. '/project-specific/public-html/fonts/' 
				. $font_name
			);
	}

	private function
		set_font($font_name = 'caslon.pfb')
	{
		$this->font = imagepsloadfont(
			PROJECT_ROOT 
			. '/project-specific/public-html/fonts/' 
			. $font_name
		);
	}

	private function
		draw_heading_label_for_character($character, $x, $y)
	{
		$character_background_color = $this->get_characters_background_color($character);

		//                $x += $this->column_width;
		//                $y -= $this->label_height;

		//                $this->center_text($text, $this->background_color, $x, $y);

		#######################

		$y += ( $this->label_height / 2.4 );
		$x += $this->column_label_padding;

		imagepstext(
			$this->image,
			$character->get_short_name(), 
			$this->font, 
			$this->font_size, 
			$this->font_color,
			$character_background_color,
			$x, $y
		);
	}

	private function
		draw_heading_label_for_stated_intention($label_text, $x, $y)
	{
		$y += ( $this->label_height / 2.4 );
		$x += ($this->column_label_padding * 3);

		imagepstext(
			$this->image,
			$label_text, 
			$this->stated_intention_font, 
			$this->font_size, 
			$this->font_color,
			$this->stated_intention_background_color,
			$x, $y
		);
	}

	private function
		draw_frame_name_label($bounding_width, $bounding_height)
	{
		// The text to draw
		$text = $this->frame->get_name();

		// Add the text
//                imagepstext (
//                        $this->image,
//                        $text,
//                        $this->font, 
//                        $this->font_size, 
//                        $this->font_color,
//                        $this->background_color,
//                        $this->padding, $this->frame_name_label_height - $this->padding
//                );

		$this->center_text(
			$text,
		       	$this->frame_name_font,
		       	$this->background_color,
		       	$bounding_width,
		       	$bounding_height
		);
	}

	private function
		get_no_of_characters()
	{
		return count($this->frame->get_characters());
	}

	private function
		center_text($text, $font, $background_color, $bounding_width, $bounding_height)
	{
		///get the left lower corner and the right upper
		list($lx,$ly,$rx,$ry) = imagepsbbox($text, $this->font, $this->font_size);
		// calculate the size of the text
		$textW = $rx - $lx;
		$textH = $ry - $ly;

		// Calculate the positions
		$positionLeft = ($bounding_width - $textW)/2;
		$positionTop = ($bounding_height - $textH)/2;

		// Add some text
//                imagettftext($image, $textSize, 0, $positionLeft, $positionTop, $white, $textFont, $textString);
		imagepstext (
			$this->image,
			$text,
			$font, 
			$this->font_size, 
			$this->font_color,
			$this->background_color,
			$positionLeft, $positionTop
		);


//                imagepstext (
//                        $this->image,
//                        $text,
//                        $this->font, 
//                        $this->font_size, 
//                        $this->font_color,
//                        $background_color,
//                        $positionLeft, $positionTop
//                );
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
