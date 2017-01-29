<?php

use GuzzleHttp\Client;

class TestClient extends Client
{
	private $object;

	public function __construct()
	{
		$this->object = new \ResponseObject();
	}

	public function request($method, $uri = '', array $options = [])
	{
		return $this->object;
	}
}

class ResponseObject 
{
	public function getBody()
	{
		return '{
		  "status": "success",
		  "country": "United States",
		  "countryCode": "US",
		  "region": "CA",
		  "regionName": "California",
		  "city": "San Francisco",
		  "zip": "94105",
		  "lat": "37.7898",
		  "lon": "-122.3942",
		  "timezone": "America\/Los_Angeles",
		  "isp": "Wikimedia Foundation",
		  "org": "Wikimedia Foundation",
		  "as": "AS14907 Wikimedia US network",
		  "query": "208.80.152.201"
		}';
	}
}