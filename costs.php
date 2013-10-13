<?php
    $msg = "";

    if( isset($_GET['action']) ){

        if( $_GET['action'] == 'xxx' ){

        }

    }


    include("includes/header.php");

    $activePage = "costs";
    include("includes/navi.php");
?>

    <div class="panel panel-default">

        <div class="panel-heading">Übersicht</div>
        <table class="table">
            <thead>
            <tr>
                <th>Art</th>
                <th>Gültig von</th>
                <th>Gültig bis</th>
                <th>Grundpreis</th>
                <th>Verbrauchspreis</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                    <td>Wasser</td>
                   <td>01.01.2013</td>
                    <td>-</td>
                    <td>-</td>
                    <td>3,71 Euro</td>
            </tr>

            </tbody>
        </table>
    </div>







<?php include("includes/footer.php"); ?>