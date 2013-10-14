<?php
    require_once("includes/main_library.php");

    $msg = "";

    if( isset($_GET['action']) ){

        if( $_GET['action'] == 'export' ){

            function array2csv(array &$array) {
               if (count($array) == 0) {
                 return null;
               }
               ob_start();
               $df = fopen("php://output", 'w');
               fputcsv($df, array_keys(reset($array)));
               foreach ($array as $row) {
                  fputcsv($df, $row);
               }
               fclose($df);
               return ob_get_clean();
            }


            function download_send_headers($filename) {
                // disable caching
                $now = gmdate("D, d M Y H:i:s");
                header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
                header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
                header("Last-Modified: {$now} GMT");

                // force download
                header("Content-Type: application/force-download");
                header("Content-Type: application/octet-stream");
                header("Content-Type: application/download");

                // disposition / encoding on response body
                header("Content-Disposition: attachment;filename={$filename}");
                header("Content-Transfer-Encoding: binary");
            }


            $db = new SQLite3($dbFileName);
            $sql = "SELECT * FROM energie";
            $result = $db->query($sql);

            $row = array();
            $i = 0;

            while($res = $result->fetchArray(SQLITE3_ASSOC)){

                $datum = date("d-m-Y - H:i", $res['timestamp']);

                $row[$i]['timestamp'] = $datum;
                $row[$i]['strom'] = $res['strom'];
                $row[$i]['heizung'] = $res['heizung'];
                $row[$i]['wasser'] = $res['wasser'];
                $i++;
            }

            download_send_headers("myenergy_export_" . date("Y-m-d") . ".csv");
            echo array2csv($row);
            die();


        } elseif ( $_GET['action'] == 'import' ){

            $uploadDir = '/Applications/XAMPP/xamppfiles/temp/';
            $uploadFile = $uploadDir . $_FILES['userfile']['name'];

            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)){
                echo "Datei ist in Ordnung und Sie wurde erfolgreich hochgeladen.";


                //$csv_datei = __DIR__ . '/daten.csv';


                $db = new SQLite3($dbFileName);

                $sql = ".mode csv energie";
                $db->query($sql);

                $sql = ".import {$csv_datei} energie";
                $db->query($sql);




            } else {
                echo "Es wurde ein Fehler gemeldet!\nHier sind die Fehler informationen:\n";
                print_r($_FILES);
            }





        }

    }


    echo getHTMLHeader("export");
    echo getNavi("export");
?>

    <?php
        if($msg != ""){
            echo ("<p class='alert alert-success'><span class='glyphicon glyphicon-ok-sign'></span> $msg</p>");
        }
    ?>


   <a href="?action=export" class="btn btn-danger">Export als CSV</a>


    <form enctype="multipart/form-data" action="?action=import" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <input name="userfile" type="file">
        <input type="submit" class="btn btn-danger" value="Import von CSV" />
    </form>


<?php
    echo getHTMLFooter();
?>