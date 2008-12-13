<?php
/**
 * Oedipus_EnglishHelper
 *
 * @copyright SANH, 2008-04-11
 *
 * functions to do with creating and parsing natural language in English
 * functions are called from Oedipus_LanguageHelper
 * uses Oedipus_InflectEnglishHelper for plurals help
 */
class
Oedipus_EnglishHelper
{
	public function
		get_explanation_for_position(
			Oedipus_Character $character,
		       	Oedipus_Position $position,
			Oedipus_Option $option
		)
	{
                /*
		 *Set the Phrases
                 */
		$owner_of_position = $position->get_character()->get_name(); 
		$owner_of_position_is_plural 
			= self::is_plural($owner_of_position);
		if ($owner_of_position == $character->get_name()) {
			if ($owner_of_position_is_plural) {
				$owner_of_option = ' they ';
			} else {
				$owner_of_option = ' he/she ';
			}
		}
		else {
			$owner_of_option = $character->get_name();
		}
		$should_or_shouldnt = $position->get_position_str(); 

                /*
		 *Construct the sentence
                 */
		$explanation = '';
		$explanation .= $owner_of_position . ' ';
		if ($owner_of_position_is_plural) {
			$explanation .= 'say ';
		} else {
			$explanation .= 'says ';
		}
		$explanation .= 'that ' . $owner_of_option . ' ';
		$explanation .= $should_or_shouldnt . ' ';
		$explanation .= $option->get_name() . '.';
		return $explanation;
	}

	public function
		get_explanation_for_stated_intention(
			Oedipus_Character $character,
		       	Oedipus_StatedIntention $stated_intention,
			Oedipus_Option $option
		)
	{
                /*
		 *Set the Phrases
		 */
		$owner_of_option = $character->get_name(); 
		$owner_of_option_is_plural 
			= self::is_plural($owner_of_option);
		if ($owner_of_option_is_plural) {
			$pronoun = ' they ';
		} else {
			$pronoun = ' he/she ';
		}
		$will_or_wont = $stated_intention->get_stated_intention_str(); 

                /*
		 *Construct the sentence
                 */
		$explanation = '';
		$explanation .= $owner_of_option . ' ';
		if ($owner_of_option_is_plural) {
			$explanation .= 'have ';
		} else {
			$explanation .= 'has ';
		}
		$explanation .= 'stated that ' . $pronoun . ' ';
		$explanation .= $will_or_wont . ' ';
		$explanation .= $option->get_name() . '.';
		return $explanation;
	}

	public static function
		is_plural($str)
	{
		return Oedipus_InflectEnglishHelper::is_plural($str);
	}

	public static function
		get_possessive($str)
	{
		if (substr($str, -1) == 's') {
			return $str . "'";
		}
		return $str . "'s";
	}

	public static function
		get_default_note_text_for_scene()
	{
		return <<<TXT
h3. Notes on this Scene

Click this note to edit it.

You can use "Textile":http://textile.thresholdstate.com/ markup.

Click on the *First Frame* to start editing this Scene.
TXT;

	}


	public static function
		get_default_note_text_for_frame()
	{
		return <<<TXT
h3. Notes on this Frame

Click this note to edit it.

You can use "Textile":http://textile.thresholdstate.com/ markup.

Use the panel below to edit characters and options in this Frame.

Click the Coloured Tiles on the Frame to change them, or hover over them to find out what they mean.
TXT;

	}


}
?>
