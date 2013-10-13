<?php

require_once("includes/weather/Widget_Weather.php");

$pageID = "homepage";
include("includes/header.php");

$activePage = "home";
include("includes/navi.php");

$myWeather = new Widget_Weather('myenergy', '0b49a5cdfe324fcef2958f5539197022', 'json');
//$searchResult = $myWeather->search("DE0004130323");
//$weatherInformation = $myWeather->getForecast($searchResult);

$wetter = $myWeather->getForecast("DE0004130323");

echo("<pre>");
var_dump($wetter);
echo("</pre>");

$tag = "2013-10-13";

// Morgens
$uhrzeit[0] = "06:00";
$imgName[0] = "n_". $wetter["forecast"][$tag][$uhrzeit[0]]["w"] ."_L.png";
$tempMax[0] = $wetter["forecast"][$tag][$uhrzeit[0]]["tx"];
$tempMin[0] = $wetter["forecast"][$tag][$uhrzeit[0]]["tn"];
$text[0] = $wetter["forecast"][$tag][$uhrzeit[0]]["w_txt"];
$niederschlag[0] = $wetter["forecast"][$tag][$uhrzeit[0]]["tx"];

// Mittags
$uhrzeit[1] = "11:00";
$imgName[1] = "n_". $wetter["forecast"][$tag][$uhrzeit[1]]["w"] ."_L.png";
$tempMax[1] = $wetter["forecast"][$tag][$uhrzeit[1]]["tx"];
$tempMin[1] = $wetter["forecast"][$tag][$uhrzeit[1]]["tn"];
$text[1] = $wetter["forecast"][$tag][$uhrzeit[1]]["w_txt"];
$niederschlag[1] = $wetter["forecast"][$tag][$uhrzeit[1]]["tx"];

// Abends
$uhrzeit[2] = "17:00";
$imgName[2] = "n_". $wetter["forecast"][$tag][$uhrzeit[2]]["w"] ."_L.png";
$tempMax[2] = $wetter["forecast"][$tag][$uhrzeit[2]]["tx"];
$tempMin[2] = $wetter["forecast"][$tag][$uhrzeit[2]]["tn"];
$text[2] = $wetter["forecast"][$tag][$uhrzeit[2]]["w_txt"];
$niederschlag[2] = $wetter["forecast"][$tag][$uhrzeit[2]]["tx"];

//Nachts
$uhrzeit[3] = "23:00";
$imgName[3] = "n_". $wetter["forecast"][$tag][$uhrzeit[3]]["w"] ."_L.png";
$tempMax[3] = $wetter["forecast"][$tag][$uhrzeit[3]]["tx"];
$tempMin[3] = $wetter["forecast"][$tag][$uhrzeit[3]]["tn"];
$text[3] = $wetter["forecast"][$tag][$uhrzeit[3]]["w_txt"];
$niederschlag[3] = $wetter["forecast"][$tag][$uhrzeit[3]]["tx"];



# <du> UTC Zeit (Unix Timestamp)
# <d> Lokale Zeit (Unix Timestamp)
# <dhu> UTC Zeit (ISO 8601)
# <dhl> Lokale Zeit (ISO 8601)
# <p> Gueltigkeitszeitraum der Prognose
# <w> Code fuer den Wetterzustand
# <pc> Niederschlagswahrscheinlichkeit in %
# <tn> Minimaltemperatur in Grad Celsius
# <tx> Maximaltemperatur in Grad Celsius
# <wd> Windrichtung in Grad
# <ws> Windgeschwindigkeit in km/h
# <w_txt> Wetter in Textform
# <wd_txt> Windrichtung Text
?>




<div class="panel panel-default">

    <div class="panel-heading">Wetter heute</div>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>Morgens</th>
            <th>Mittags</th>
            <th>Abends</th>
            <th>Nachts</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Bild</td>
            <td><img src="img/wetter.com/<?php echo $imgName[0] ?>" alt="" /></td>
            <td><img src="img/wetter.com/<?php echo $imgName[1] ?>" alt="" /></td>
            <td><img src="img/wetter.com/<?php echo $imgName[2] ?>" alt="" /></td>
            <td><img src="img/wetter.com/<?php echo $imgName[3] ?>" alt="" /></td>
        </tr>
        <tr>
            <td>Text</td>
            <td><?php echo($text[0]); ?></td>
            <td><?php echo($text[1]); ?></td>
            <td><?php echo($text[2]); ?></td>
            <td><?php echo($text[3]); ?></td>
        </tr>
        <tr>
            <td>Temeratur max (°C)</td>
            <td><?php echo($tempMax[0]); ?></td>
            <td><?php echo($tempMax[1]); ?></td>
            <td><?php echo($tempMax[2]); ?></td>
            <td><?php echo($tempMax[3]); ?></td>
        </tr>
        <tr>
            <td>Temeratur min (°C)</td>
            <td><?php echo($tempMin[0]); ?></td>
            <td><?php echo($tempMin[1]); ?></td>
            <td><?php echo($tempMin[2]); ?></td>
            <td><?php echo($tempMin[3]); ?></td>
        </tr>
        <tr>
            <td>Regen</td>
            <td><?php echo($niederschlag[0]); ?></td>
            <td><?php echo($niederschlag[1]); ?></td>
            <td><?php echo($niederschlag[2]); ?></td>
            <td><?php echo($niederschlag[3]); ?></td>
        </tr>
    </tbody>
    </table>
</div>