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
