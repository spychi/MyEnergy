<?php

    require_once("includes/main_library.php");

    echo getHTMLHeader("homepage");
    echo getNavi("home");


	$db = new SQLite3($dbFileName);
	$sql = "SELECT * FROM energie";
	$result = $db->query($sql);

	$labels = "";
	$strom = "";
	$heizung = "";
	$wasser = "";

	while($res = $result->fetchArray(SQLITE3_ASSOC)){

		$labels .= "'" .$res['creationdate'] . "', ";
		$strom .= $res['electricity'] . ", ";
		$heizung .= $res['heating'] . ", ";
		$wasser .= $res['water'] . ", ";

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

<!--
<canvas id="myChart" class="img-responsive" width="600" height="400"></canvas>
-->
<!--

    <div class="panel panel-default">

        <div class="panel-heading">Durchschnitt</div>
        <table class="table">
            <thead>
            <tr>
                <th>Monat</th>
                <th>Strom <span>[kW/h]</span></th>
                <th>Heizung<span>[kW/h]</span></th>
                <th>Wasser<span>[m<sup>3</sup>]</span></th>
            </tr>
            </thead>
            <tbody>


            <?php
                $jan = getMonthAverage('2013', '01');
                $feb = getMonthAverage('2013', '02');
                $mar = getMonthAverage('2013', '03');
                $apr = getMonthAverage('2013', '04');

            ?>

          <tr>
              <td>Januar</td>
              <td><?php echo $jan['electricity']; ?></td>
              <td><?php echo $jan['heating']; ?></td>
              <td><?php echo $jan['water']; ?></td>
          </tr>
          <tr>
              <td>Februar</td>
              <td><?php echo $feb['electricity']; ?></td>
              <td><?php echo $feb['heating']; ?></td>
              <td><?php echo $feb['water']; ?></td>
          </tr>
          <tr>
              <td>März</td>
              <td><?php echo $mar['electricity']; ?></td>
              <td><?php echo $mar['heating']; ?></td>
              <td><?php echo $mar['water']; ?></td>
          </tr>
          <tr>
              <td>April</td>
              <td><?php echo $apr['electricity']; ?> (<?php echo $apr['electricityPrice']; ?>€)</td>
              <td><?php echo $apr['heating']; ?> (<?php echo $apr['heatingPrice']; ?>€)</td>
              <td><?php echo $apr['water']; ?> (<?php echo $apr['waterPrice']; ?>€)</td>
          </tr>


            </tbody>
        </table>
    </div>

    </div>
-->

<?php
    echo getHTMLFooter();
?>