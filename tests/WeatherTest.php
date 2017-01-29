<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class WeatherTest extends TestCase
{

	public function testNoParams()
	{
		$this->get('/weather')
            ->seeJsonStructure([
                'ip',
                'city',
                'temperature' => [
                    'current',
                    'low',
                    'high',
                ],
                'wind' => [
                    'speed',
                    'direction',
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
        $this->get('/weather/8.8.8.8')
            ->seeJsonStructure([
                'ip',
                'city',
                'temperature' => [
                    'current',
                    'low',
                    'high',
                ],
                'wind' => [
                    'speed',
                    'direction',
                ]
            ]);   
    }
}
