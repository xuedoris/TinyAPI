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
				return response()->json($data, $code);
				break;
			case 'application/csv':
				break;
			default:
				
				break;
		}
	}
}