<?php
/**
 * Oedipus_EnglishHelper
 *
 * @copyright SANH, 2008-04-11
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
		if (substr($str, -1) == 's') {
			return TRUE;
		}
		return FALSE;
	}


}
?>

