<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms
{
	function send($destination, $content){
		$ci =& get_instance();
		$userKey = $ci->config->item('sms_user_key');
		$passKey = $ci->config->item('sms_pass_key');

		$xmlResponse = simplexml_load_file("http://sms.client.web.id/api?user=$userKey&pass=$passKey&senderid=&nomor=$destination&pesan=".urlencode($content));
		$jsonResponse = json_encode($xmlResponse);
		$response = json_decode($jsonResponse);

		return $response->message;
	}
}

/* End of file Sms.php */
/* Location: ./application/libraries/Sms.php */