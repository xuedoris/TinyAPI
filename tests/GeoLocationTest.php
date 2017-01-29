<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Libraries\GeoLocation\IpApi;
use TestClient;

class GeoLocationTest extends TestCase
{

	public function testNoParams()
	{
		$this->get('/geolocation')
            ->seeJsonStructure([
                'ip',
                'geo' => [
                    'service', 'city', 'region', 'country'
                ]
            ]);
	}

    /**
     * 
     *
     * @return void
     */
    public function testValidResponse()
    {
        
        $this->get('/geolocation?service=ip-api')
            ->seeJsonStructure([
                'ip',
                'geo' => [
                    'service', 'city', 'region', 'country'
                ]
            ]);

        $this->get('/geolocation/8.8.8.8')
            ->seeJsonStructure([
                'ip',
                'geo' => [
                    'service', 'city', 'region', 'country'
                ]
            ]);
        $this->get('/geolocation/8.8.8.8?service=freegeoip')
            ->seeJsonStructure([
                'ip',
                'geo' => [
                    'service', 'city', 'region', 'country'
                ]
            ]);

        $this->get('/geolocation/8.8.8.8?service=ip-api')
            ->seeJsonStructure([
                'ip',
                'geo' => [
                    'service', 'city', 'region', 'country'
                ]
            ]);
    }

    public function testGetData()
    {
    	$ipApi = new IpApi(new \TestClient());
    	$data = $ipApi->getGeoData('208.80.152.201');
    	
    	$this->assertEquals($data['ip'], '208.80.152.201');
    	$this->assertEquals($data['geo']['service'], 'ip-api');
    	$this->assertEquals($data['geo']['city'], 'San Francisco');
    	$this->assertEquals($data['geo']['region'], 'California');
    	$this->assertEquals($data['geo']['country'], 'United States');
    }
}
