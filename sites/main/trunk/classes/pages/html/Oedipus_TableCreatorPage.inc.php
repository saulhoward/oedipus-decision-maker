<?php
/**
 * Oedipus_TableCreatorPage
 *
 * @copyright 2008-03-30, RFI
 */

class
	Oedipus_TableCreatorPage
extends
	Oedipus_HTMLPage
{
	public function
		content()
	{
		echo <<<HTML
<h2>Drama Theoretic Table Creator</h2>
<p>
	This is the table creator
</p>
HTML;

		// Creating a Table
		// -----------------
		// 1.
		// Create the actors,
		// and their options, options have stated intentions
		$actors = array();

		$ryu = new Oedipus_Actor('Ryu', 'blue');
		$ryus_options = array();
		$stated_intention_1 = new Oedipus_StatedIntention('1', 'q');
		$ryus_options[] = new Oedipus_Option('jump up and down', $stated_intention_1);
		$stated_intention_2 = new Oedipus_StatedIntention('0', 'x');
		$ryus_options[] = new Oedipus_Option('shake it all about', $stated_intention_2);
		foreach ($ryus_options as $ryus_option)
		{
			$ryu->add_option($ryus_option);
		}

		$ganja_master = new Oedipus_Actor('Ganja Master', 'red');

		$actors[] = $ryu;
		$actors[] = $ganja_master;
		
		// 2.
		// create the positions 
		// attached to options for ease of display (?)
		// positions have an actor as well as an option
		foreach ($actors as $actor)
		{
			foreach ($actor->get_options() as $option)
			{
				$positions = array();

				foreach ($actors as $position_actor)
				{
					$positions[$position_actor->get_name()] =
					       	new Oedipus_Position('0', 'q', $position_actor);
				}

				$option->add_positions($positions);
			}
		}
		
		// 3.
		// Create the table
		$table = new Oedipus_Table('Example Table', $actors);

		// DEBUG
//                print_r($table->get_actors());exit;

		// 4.
		// Create the HTMLTable from the Oedipus_Table object
		// and display it
		$html_table = new Oedipus_OedipusHTMLTable($table);
		echo $html_table->get_as_string();
	}

}
?>
