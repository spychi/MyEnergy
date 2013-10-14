<?php

    require_once("includes/main_library.php");

    $msg = "";

    if( isset($_GET['action']) ){

        if( $_GET['action'] == 'write' ){

            $ts = $_POST['date_ts'];
            //$ts = date("d-m-Y - H:i", $_POST['date']);

            //print($ts);


            $strom = $_POST['strom'];
            $heizung = $_POST['heizung'];
            $wasser = $_POST['wasser'];

            $db = new SQLite3('db/database.db');
            $db->exec("INSERT INTO energie VALUES ($ts,  $strom,  $heizung,  $wasser)");
            $msg = "Daten geschrieben!";
         }
    }


    echo getHTMLHeader("writePage");
    echo getNavi("write");

?>

    <?php
        if($msg != ""){
            echo ("<p class='alert alert-success'><span class='glyphicon glyphicon-ok-sign'></span> $msg</p>");
        }
    ?>


<form id="write" action="?action=write" role="form" method="POST">
    <div class="form-group">
        <input type="Number" name="strom" id="strom" placeholder="Strom"/>
    </div>

    <div class="form-group">
        <input type="Number" name="heizung" id="heizung" placeholder="heizung" />
    </div>

    <div class="form-group">
        <input type="Number" name="wasser" id="wasser" placeholder="wasser"/>
    </div>

    <div class="form-group">
        <input type="text" name="date" id="date" placeholder="Datum" value=""/>
        <input type="hidden" name="date_ts" id="date_ts" value=""/>
    </div>

    <div class="form-group">
        <input type="submit" value="Speichern" class="btn btn-primary" />
    </div>

</form>

<?php
    echo getHTMLFooter();
?>