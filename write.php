<?php

    require_once("includes/main_library.php");

    $msg = "";

    if( isset($_GET['action']) ){

        if( $_GET['action'] == 'write' ){

            $ts = $_POST['date'];
            $strom = $_POST['strom'];
            $heizung = $_POST['heizung'];
            $wasser = $_POST['wasser'];

            $db = new SQLite3($dbFileName);
            $db->exec("INSERT INTO energie VALUES ('$ts',  $strom,  $heizung,  $wasser)");
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


<form id="write" action="?action=write" role="form" method="POST" novalidate="novalidate">
    <div class="form-group">
        <input type="Number" name="strom" id="strom" placeholder="Strom"/>
    </div>

    <div class="form-group">
        <input type="Number" name="heizung" id="heizung" placeholder="Heizung" />
    </div>

    <div class="form-group">
        <input type="Number" name="wasser" id="wasser" placeholder="Wasser"/>
    </div>

    <div class="form-group">
        <input type="text" name="date" id="date" placeholder="Ablesedatum" value=""/>

    </div>

    <div class="form-group">
        <input type="submit" value="Speichern" class="btn btn-primary" />
    </div>

</form>

<?php
    echo getHTMLFooter();
?>