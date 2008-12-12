<?php
/**
 * Oedipus_FrameXMLPage
 * 
 * @copyright Clear Line Web Design, 2007-12-10
 */

/**
 * an XML redirect-script for AJAX, which takes in get and post and gives back xml
 */
class
Oedipus_FrameXMLPage
extends
Oedipus_HTMLPage
{
	protected $return_xml;

	protected function
		get_return_xml()
	{
		return $this->return_xml;
	}

	protected function
		set_return_xml($xml)
	{
		$this->return_xml = $xml;
	}

	public function
		render()
	{
		//                $this->render_doctype();
		//                $this->render_xml();
		//
		/*
		 * The $_GET
		 */
		if (isset($_GET['frame_id']))
		{
			$this->frame_id = $_GET['frame_id'];

			if (
				isset($_GET['edit_position'])
				&&
				isset($_GET['position_id'])
				&&
				isset($_GET['position_tile'])
				&&
				isset($_GET['position_doubt'])
			) {
				$new_position = Oedipus_FrameHelper::update_position_by_id(
					$_GET['position_id'],
					$_GET['position_tile'],
					$_GET['position_doubt']
				);
				$this->set_return_xml($new_position);
				//print_r($new_position);exit;
			}
			elseif (
				isset($_GET['edit_stated_intention'])
				&&
				isset($_GET['stated_intention_id'])
				&&
				isset($_GET['stated_intention_tile'])
				&&
				isset($_GET['stated_intention_doubt'])
			) {
				$new_stated_intention = 
					Oedipus_FrameHelper::update_stated_intention_by_id(
						$_GET['stated_intention_id'],
						$_GET['stated_intention_tile'],
						$_GET['stated_intention_doubt']
					);
				$this->set_return_xml($new_stated_intention);
			}
		}
		echo $this->get_return_xml();
	}

	public function
		render_doctype()
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
	}

	public function
		content()
	{

	}
}
?>
