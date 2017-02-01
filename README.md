# Mini RestfulAPI by Xueyuan

### Overview

This is a basic HTTP API web application for returning the following information serialized as JSON:

1. Geolocation information:
    * Target IP address (use client IP if none specified)
    * City/State/Country of IP
2. Weather information using the geolocated city of the target IP address
    * Current temperature (in **celcius**)
    * Wind speeds

For IP Geolocation, the application uses the following two free services:

1. [ip-api.com](http://ip-api.com/)
2. [freegeoip.net](http://freegeoip.net/)

For weather, it uses [OpenWeatherMap API](http://openweathermap.org/current)

### Endpoints

##### `GET /geolocation`

##### `GET /geolocation/:ip_address`

##### `GET /weather`

##### `GET /weather/:ip_address`

### Sample Requests

```
GET /geolocation
```

```json
{
    "ip": "8.8.8.8",
    "geo": {
        "service": "ip-api",
        "city": "Mountain View",
        "region": "California",
        "country": "United States"
    }
}
```

```
GET /weather/8.8.8.8
```

```json
{
    "ip": "8.8.8.8",
    "city": "Mountain View",
    "temperature": {
        "current": 13,
        "low": 11,
        "high": 16,
    },
    "wind": {
        "speed": 11,
        "direction": 240
    }
}
```

## Install

### 1. Clone the source code.

```shell
git clone https://github.com/xuedoris/php-code-challenge-a.git
```

### 2. Set the basic config

Edit the `.env` file and set the `APP_KEY` and other config for the system. You can leave the `database` setting blank since it's optional in this app.
> **NOTE:** DO NOT modify `OPENWEATHER_KEY` config field since the it's needed by the third party Weather API:
`OPENWEATHER_KEY=6103b0f582e78c7382bc6b0cdc06deb8`

### 3. Install the extended package dependency.

Go into php-code-challenge-a directory and install the extended dependencies: 

```shell
composer install
```

### 4. Point your web root to the app index file.
For instance, in linux Nginx server go to nginx config directory and modify the server config file: 
``` 
root /exampleDirectory/php-code-challenge-a/public/;
```
Restart the server. 
``` 
sudo service nginx restart
```
Then you should be able to hit http://youweburl.com/geolocation for testing the API.

## License

The project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


