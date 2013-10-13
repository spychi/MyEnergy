<?php

class Widget_Weather
{
    private $_url = 'http://api.wetter.com';
    private $_projectName;
    private $_apiKey;
    private $_outputFormat;

    public function __construct($projectName, $apiKey, $outputFormat) {
        $this->_projectName = $projectName;
        $this->_apiKey = $apiKey;
        $this->_outputFormat = $outputFormat;
    }

    // return first result if there are more than one
    public function search($search) {
        // if it's a number, it's a postcode
        if (is_numeric($search)) {
            $checksum = md5($this->_projectName.$this->_apiKey.$search);
            $url = $this->_url.'/location/plz/search/'.$search.'/project/'.$this->_projectName.'/cs/'.$checksum.'/output/' . $this->_outputFormat;
        } else {
            $checksum = md5($this->_projectName.$this->_apiKey.$search);
            $url = $this->_url.'/location/index/search/'.$search.'/project/'.$this->_projectName.'/cs/'.$checksum.'/output/' . $this->_outputFormat;
        }

        echo("<!-- <strong url=' >" .$url . "'</strong><br> -->");
        $api = json_decode(file_get_contents($url), true);

        return $api['search']['result'][0]['city_code'];
    }

    public function getForecast($cityCode) {
        $checksum = md5($this->_projectName.$this->_apiKey.$cityCode);
        $url = $this->_url.'/forecast/weather/city/'.$cityCode.'/project/'.$this->_projectName.'/cs/'.$checksum.'/output/' . $this->_outputFormat;

        echo("<!-- <strong url=' >" .$url . "'</strong><br> -->");
        $api = json_decode(file_get_contents($url), true);

        return $api['city'];
    }
}

?>