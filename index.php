<?php
    if( isset($_GET['action'])  ){

       // print_r($_POST);

        $ts = $_POST['date_ts'];
        $strom = $_POST['strom'];
        $heizung = $_POST['heizung'];
        $wasser = $_POST['wasser'];

        $db = new SQLite3('db/test.db');

        //$db->exec('DROP TABLE energie');
        //$db->exec('CREATE TABLE energie (timestamp STRING, strom STRING, heizung STRING, wasser STRING)');
        $db->exec("INSERT INTO energie VALUES ($ts,  $strom,  $heizung,  $wasser)");

        //$result = $db->query('SELECT * FROM energie where timestamp = "1"');

        //echo "<pre>";
        //var_dump($result->fetchArray());

         print("Daten geschrieben!");

    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Energie Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1>Energie Monitor</h1>

<form action="?action=write" role="form" method="POST">
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/my.js"></script>

</body>
</html>
</body>
</html>