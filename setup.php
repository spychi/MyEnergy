<?php
    $msg = "";

    if( isset($_GET['action']) ){

        if( $_GET['action'] == 'create_table' ){

            $db = new SQLite3('db/database.db');
            $db->exec('CREATE TABLE energie (creationdate TEXT, electricity REAL, heating REAL, water REAL)');

            $msg = "Table angelegt!";

        } else if( $_GET['action'] == 'drop_table'){

            $db = new SQLite3('db/database.db');
            $db->exec('DROP TABLE energie');
            $msg = "Table gel&ouml;scht!";
          }

    }


    include("includes/header.php");

    $activePage = "setup";
    include("includes/navi.php");
?>

    <?php
        if($msg != ""){
            echo ("<p class='alert alert-success'><span class='glyphicon glyphicon-ok-sign'></span> $msg</p>");
        }
    ?>

    <form action="?action=create_table" role="form" method="POST">
        <div class="form-group">
            <input type="submit" value="Table anlegen" class="btn btn-danger" />
        </div>
    </form>
    <form action="?action=drop_table" role="form" method="POST">
        <div class="form-group">
            <input type="submit" value="Table l&ouml;schen" class="btn btn-danger" />
        </div>
    </form>


<?php include("includes/footer.php"); ?>