<?php
    require_once("includes/main_library.php");


    $weatherData = getWeatherData();

    echo ($weatherData['ts'] );
    echo (writeWeatherDataInDB($weatherData));
    print_r ($weatherData);
