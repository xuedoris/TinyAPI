<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	// default to JSON
	private $contentType = 'application/json';

	public function setContentType($type)
	{
		$this->contentType = $type !== null ? $type : 'application/json';
	}

	public function getContentType()
	{
		return $this->contentType;
	}

	public function sendReponse($data, $code)
	{
		// @todo need to implemnt other content type
		switch ($this->getContentType()) {
			case 'application/json':
				echo json_encode($data, JSON_PRETTY_PRINT);
				break;
			case 'application/xml':
				$xml = new \SimpleXMLElement('<root/>');
				array_walk_recursive($data, array($xml, 'addChild'));
				echo $xml->asXML();
				break;
			default:
				
				break;
		}
	}
}