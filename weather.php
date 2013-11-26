<?php
    require_once("includes/main_library.php");

    echo getHTMLHeader("writePage");
    echo getNavi("weather");

    $weatherData = getWeatherData();
?>

<table>
    <tr>
        <td>Datum</td>
        <td><?php echo ($weatherData['ts']); ?> Uhr</td>
    </tr>
    <tr>
        <td>Temeratur</td>
        <td><?php echo ($weatherData['temperature']); ?>&deg;C</td>
    </tr>
    <tr>
        <td>Beschreibung</td>
        <td><?php echo ($weatherData['description']); ?></td>
    </tr>
    <tr>
        <td>Windgeschwindigkeit</td>
        <td><?php echo ($weatherData['windSpeed']); ?> km/h</td>
    </tr>
    <tr>
        <td>Sonnenaufgang</td>
        <td><?php echo ($weatherData['sunrise']); ?> Uhr</td>
    </tr>
    <tr>
        <td>Sonnenuuntergang</td>
        <td><?php echo ($weatherData['sunset']); ?> Uhr</td>
    </tr>
    <tr>
        <td>conditionCode</td>
        <td><?php echo ($weatherData['conditionCode']); ?></td>
    </tr>
    <tr>
        <td>locationCity</td>
        <td><?php echo ($weatherData['locationCity']); ?></td>
    </tr>


</table>


<style>
    #weatherBox {
        color:#fff;
        font-size: 60px;
        padding: 20px;

        border: 4px solid #000;

        background: #959595; /* Old browsers */
        background: -moz-linear-gradient(top,  #959595 0%, #0d0d0d 46%, #010101 50%, #0a0a0a 53%, #4e4e4e 76%, #383838 87%, #1b1b1b 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#959595), color-stop(46%,#0d0d0d), color-stop(50%,#010101), color-stop(53%,#0a0a0a), color-stop(76%,#4e4e4e), color-stop(87%,#383838), color-stop(100%,#1b1b1b)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #959595 0%,#0d0d0d 46%,#010101 50%,#0a0a0a 53%,#4e4e4e 76%,#383838 87%,#1b1b1b 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #959595 0%,#0d0d0d 46%,#010101 50%,#0a0a0a 53%,#4e4e4e 76%,#383838 87%,#1b1b1b 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #959595 0%,#0d0d0d 46%,#010101 50%,#0a0a0a 53%,#4e4e4e 76%,#383838 87%,#1b1b1b 100%); /* IE10+ */
        background: linear-gradient(to bottom,  #959595 0%,#0d0d0d 46%,#010101 50%,#0a0a0a 53%,#4e4e4e 76%,#383838 87%,#1b1b1b 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#959595', endColorstr='#1b1b1b',GradientType=0 ); /* IE6-9 */

        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
    }
</style>


<span id="weatherBox" class="night sun">
    <?php echo ($weatherData['temperature']); ?>&deg;C
</span>


<?php
    echo getHTMLFooter();
?>