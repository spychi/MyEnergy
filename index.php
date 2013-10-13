<?php

    $pageID = "homepage";
    include("includes/header.php");

    $activePage = "home";
    include("includes/navi.php");


	$db = new SQLite3('db/database.db');
	$sql = "SELECT * FROM energie";
	$result = $db->query($sql);

	$labels = "";
	$strom = "";
	$heizung = "";
	$wasser = "";

	while($res = $result->fetchArray(SQLITE3_ASSOC)){

		$datum = date("d-m-Y - H:i", $res['timestamp']);

		$labels .= "'" .$datum . "', ";
		$strom .= $res['strom'] . ", ";
		$heizung .= $res['heizung'] . ", ";
		$wasser .= $res['wasser'] . ", ";

	}


?>

<script>
	var data = {
        labels : [<?php echo ($labels); ?>],
        datasets : [
            {
                fillColor : "rgba(243,255,0,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                data : [<?php echo ($strom); ?>]
            },
            {
                fillColor : "rgba(255,149,0,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                data : [<?php echo ($heizung); ?>]
            },
            {
                fillColor : "rgba(51,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                data : [<?php echo ($wasser); ?>]
            }

        ]
    }


</script>

<canvas id="myChart" class="img-responsive" width="600" height="400"></canvas>


<?php include("includes/footer.php"); ?>