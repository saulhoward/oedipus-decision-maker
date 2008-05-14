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
	private $image;
	private $table;

	public function
		render()
	{
		if (isset($_GET['table_id']))
		{
			$this->table =
				Oedipus_TableCreationHelper::get_oedipus_table_by_id($_GET['table_id']);
			$this->image = $this->get_oedipus_table_image();
		}

		if (isset($this->image))
		{
			imagepng($this->image);
			imagedestroy($this->image);
		}
	}

	private function
		get_oedipus_table_image()
	{
		
		// Make main rectangle
		// width = label + (1 X no_of_actors) + 1 for si
		// height = 1 for header + (1 x no_of_actors)
		//

		$label_width = 200;
		$no_of_actors = $this->get_no_of_actors();

		$table_width = $label_width + (100 * $no_of_actors) + 100;

		$table_image = imagecreatetruecolor($table_width, 500);
//                imagesavealpha($table_image, true);

//                $trans_colour = imagecolorallocatealpha($table_image, 0, 0, 0, 127);
//                imagefill($table_image, 0, 0, $trans_colour);

		$red = imagecolorallocate($table_image, 255, 0, 0);
		imagefilledellipse($table_image, 400, 300, 400, 300, $red);

		return $table_image;
	}

	private function
		get_no_of_actors()
	{
		return count($this->table->get_actors());
	}

	// IMAGE FILES for overlaying, etc.
	//
	private function
		get_oedipus_logo_image()
	{
		return $this->load_png(
			PROJECT_ROOT 
			. "/project-specific/public-html/images/oedipus-logo-with-head.png"
		);
	}
}
?>
