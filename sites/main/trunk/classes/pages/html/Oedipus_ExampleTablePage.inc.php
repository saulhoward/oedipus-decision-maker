<?php
/**
 * Oedipus_ExampleTablePage
 *
 * @copyright 2008-03-30, RFI
 */

class
	Oedipus_ExampleTablePage
extends
	Oedipus_HTMLPage
{
	public function
		content()
	{
		echo <<<HTML
		<table class="oedipus">
			<caption>
				Drama Theory Example Table
			</caption>

			<!-- colgroup defines columns for css -->
			<colgroup class="options-column" span="1">
			</colgroup>
			<colgroup class="actor-column" id="actor1" span="1">
			</colgroup>

			<thead>
				<tr>
					<th>
					</th>
					<th>
						Actor 1
					</th>
					<th>
						Actor 2
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>
						Actor 1
					</th>
					<td>
					</td>
					<td>
					</td>

				</tr>	
				<tr>
					<th>
						option 1	
					</th>
					<td>
						<a href="#" class="position-card" id="actor1-option1">0</a>
					</td>
					<td>
						<a href="#" class="position-card" id="actor2-option1">1</a>
					</td>
				</tr>
				<tr>
					<th>
						option 2	
					</th>
					<td>
						<a href="#" class="position-card" id="actor1-option2">0</a>
					</td>
					<td>
						<a href="#" class="position-card" id="actor2-option2">1</a>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td>
					</td>

					<td>
					</td>

					<td>
					</td>

				</tr>
			</tfoot>
		</table>
HTML;

	}
}
?>
