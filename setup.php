<?php
    require_once("includes/main_library.php");

    $msg = "";

    if( isset($_GET['action']) ){

        if( $_GET['action'] == 'create_table' ){

            $db = new SQLite3($dbFileName);
            // YYYY-MM-DD HH:MM:SS.SSS
            $db->exec('CREATE TABLE energie (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                creationdate TEXT,
                electricity REAL,
                heating REAL,
                water REAL)');


// CREATE  TABLE "main"."weather" ("creationdate" TEXT, "temperature" REAL, "description" TEXT, "WindSpeed" REAL, "sunrise" TEXT, "sunset" TEXT)

            $msg = "Table angelegt!";

        } else if( $_GET['action'] == 'drop_table'){

            $db = new SQLite3($dbFileName);
            $db->exec('DROP TABLE energie');
            $msg = "Table gel&ouml;scht!";
          }

    }

    echo getHTMLHeader("setup");
    echo getNavi("setup");

?>

    <?php
        if($msg != ""){
            echo ("<p class='alert alert-success'><span class='glyphicon glyphicon-ok-sign'></span> $msg</p>");
        }
    ?>
    <form action="?action=drop_table" role="form" method="POST">
        <div class="form-group">
            <input type="submit" value="Table l&ouml;schen" class="btn btn-danger" />
        </div>
    </form>
    <form action="?action=create_table" role="form" method="POST">
        <div class="form-group">
            <input type="submit" value="Table anlegen" class="btn btn-danger" />
        </div>
    </form>

<?php
    echo getHTMLFooter();
?>