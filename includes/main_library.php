<?php

    include 'YahooWeather.class.php';


    $dbFileName = "db/database.sqlite";

    include("header.php");

    include("navi.php");

    include("footer.php");



    function getMonthAverage ($year, $month) {

        $dbFileName = "db/database.sqlite";

        $tmp = array();
        $begin = $year . "-". $month. "-01";
        $end =   $year . "-". $month. "-30";

        $db = new SQLite3($dbFileName);
        $sql = "SELECT * FROM energie WHERE creationdate = date('$begin');";
        $result = $db->query($sql);

        while($res = $result->fetchArray(SQLITE3_ASSOC)){
            $stromB = $res['electricity'];
            $heizungB = $res['heating'];
            $wasserB = $res['water'];
        }

        $sql = "SELECT * FROM energie WHERE creationdate = date('$end');";
        $result = $db->query($sql);

        while($res = $result->fetchArray(SQLITE3_ASSOC)){
            $stromE = $res['electricity'];
            $heizungE = $res['heating'];
            $wasserE = $res['water'];
        }

        if(true){
            $tmp['electricity'] = $stromE - $stromB;
            $tmp['heating'] = $heizungE - $heizungB;
            $tmp['water'] = $wasserE - $wasserB;

            $tmp['electricityPrice'] = ($stromE - $stromB) * 0.2746;
            $tmp['heatingPrice'] = ($heizungE - $heizungB) * 0.2237;
            $tmp['waterPrice'] = ($wasserE - $wasserB) * 3.81;
        }



        return $tmp;
    }

    function getWeatherData () {
        $tmp = array();

        // https://github.com/OnkelCino/Yahoo-Weather-API-PHP-class
        $weather = new YahooWeather(26822567, 'c');


        $tmp['ts'] = $weather->getLastUpdated($date_format = 'Y-m-d G:i');
        $tmp['temperature']  = $weather->getTemperature($showunit = false);
        $tmp['description']  = $weather->getDescription();
        $tmp['windSpeed']    = $weather->getWindSpeed($showunit = false, $decimals = 0, $separator = ',');
        $tmp['sunrise']      = $weather->getSunrise($time_format = 'G:i');
        $tmp['sunset']       = $weather->getSunset($time_format = 'G:i');
        $tmp['conditionCode']= $weather->getConditionCode();
        $tmp['locationCity']= $weather->getLocationCity();


        return $tmp;
    }

    function writeWeatherDataInDB ($weatherData) {

        $dbFileName = "db/database.sqlite";

        $ts = $weatherData['ts'];
        $temperature = $weatherData['temperature'];
        $description = $weatherData['description'];
        $windSpeed = $weatherData['windSpeed'];
        $sunrise = $weatherData['sunrise'];
        $unset = $weatherData['sunset'];

        $db = new SQLite3($dbFileName);
        $count = $db->querySingle("select COUNT(*) as count FROM weather where creationdate = '$ts'");

        if (true) {
            $db->exec("INSERT INTO weather VALUES ('$ts', $temperature, '$description', '$windSpeed', '$sunrise', '$unset')");
            return ("Daten geschrieben!");
        } else {
            return ("Daten NICHT geschrieben!");
        }
    }