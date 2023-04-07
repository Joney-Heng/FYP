<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{   
		$this->load->view('main_header');
		$this->load->view('home_view');
	}
	
	public function test()
	{
		$this->load->view('test');
		// exit;
		// $curl = curl_init();
		
		// curl_setopt_array($curl, array(
		//   CURLOPT_URL => 'https://storage-api-ten.vercel.app/files',
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_FOLLOWLOCATION => true,
		//   CURLOPT_SSL_VERIFYHOST => false,
		//   CURLOPT_SSL_VERIFYPEER => false,
		//   CURLOPT_POST => true,
		//   CURLOPT_POSTFIELDS => array(
		// 	'file' => curl_file_create('/C:/Users/User/Downloads/Black White Modern Online Shop Logo (1).png') //user post
		//   )
		// ));
		
		// $response = curl_exec($curl);
		// $error = curl_error($curl);
		
		// curl_close($curl);
		
		// if ($error) {
		//   echo "cURL Error: $error";
		// } else {
		//   echo $response;
		// }

		// $url = 'https://storage-api-ten.vercel.app/files';
		// $filePath = '/C:/Users/User/Downloads/Black White Modern Online Shop Logo (1).png';

		// $ch = curl_init();

		// curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch, CURLOPT_POST, 1);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		// curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification

		// $cfile = new CURLFile($filePath);
		// $postFields = array('file' => $cfile);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

		// $response = curl_exec($ch);

		// if ($response === false) {
		// 	echo 'Error: ' . curl_error($ch);
		// } else {
		// 	echo $response;
		// }

		// curl_close($ch);
		
	}

	public function upload()
	{
		$url = 'https://storage-api-ten.vercel.app/files';

		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Set timeout to 60 seconds
	
	
		$data = $_FILES['multipartFile'];
		$postData = array(
			"file" => new CURLFile($data['tmp_name'], $data['type'], $data['name'])
		);
	
		curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);
	
		$response = curl_exec($ch);
	
		if ($response === false) {
			return 'Error: ' . curl_error($ch);
		} else {
			return $response;
		}
	
		curl_close($ch);
	}
	

}
