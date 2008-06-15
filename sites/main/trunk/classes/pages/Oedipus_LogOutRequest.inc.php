<?php
class
	Oedipus_LogOutRequest
extends
	PublicHTML_HaddockHTTPResponse
{
	public function
		send_http_headers()
	{
		session_start();
		
		if (isset($_SESSION['logged-in-id'])) {
			unset($_SESSION['logged-in-id']);
		}
		
		header('Location: /');
	}
}
?>
