<?php
/**
 * Oedipus_LanguageHelper
 *
 * @copyright SANH, 2008-04-11
 *
 * All functions to do with creating and parsing natural language
 * uses Oedipus_EnglishHelper for now, should use haddock config?
 */
class
Oedipus_LanguageHelper
{
	public function
		get_explanation_for_position(
			Oedipus_Character $character,
		       	Oedipus_Position $position,
			Oedipus_Option $option
		)
	{
		return Oedipus_EnglishHelper::get_explanation_for_position(
			$character,
		       	$position,
			$option
		);
	}

	public function
		get_explanation_for_stated_intention(
			Oedipus_Character $character,
		       	Oedipus_StatedIntention $stated_intention,
			Oedipus_Option $option
		)
	{
		return Oedipus_EnglishHelper::get_explanation_for_stated_intention(
			$character,
			$stated_intention,
			$option
		);
	}
        
	public static function
		is_plural($str)
	{
		return Oedipus_EnglishHelper::is_plural($str);
	}

	public static function
		get_possessive($str)
	{
		return Oedipus_EnglishHelper::get_possessive($str);
	}

	public static function
		get_default_note_text_for_scene()
	{
		return Oedipus_EnglishHelper::get_default_note_text_for_scene();
	}


	public static function
		get_default_note_text_for_frame()
	{
		return Oedipus_EnglishHelper::get_default_note_text_for_frame();
	}

}
?>
