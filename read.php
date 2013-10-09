<?php
    $msg = "";

   $db = new SQLite3('db/database.db');
   $sql = "SELECT * FROM energie";
   $result = $db->query($sql);

   $row = array();
   $i = 0;

    while($res = $result->fetchArray(SQLITE3_ASSOC)){
        $row[$i]['timestamp'] = $res['timestamp'];
        $row[$i]['strom'] = $res['strom'];
        $row[$i]['heizung'] = $res['heizung'];
        $row[$i]['wasser'] = $res['wasser'];
        $i++;
    }

    include("includes/header.php");

    $activePage = "read";
    include("includes/navi.php");
?>

<div class="panel panel-default">

  <div class="panel-heading">Übersicht</div>
	   <table class="table">
	       <thead>
	             <tr>
	                <th>Timestap</th>
	                <th>Strom</th>
	                <th>Heizung</th>
	                <th>Wasser</th>
	             </tr>
	         </thead>
	     <tbody>

	     <?php
	         foreach ($row as $r) {

	            $datum = date("d-m-Y - H:i", $r['timestamp']);

	            echo ("<tr>");
	            echo ("<td>" . $datum . "</td>");
	            echo ("<td>" . $r['strom'] . "</td>");
	            echo ("<td>" . $r['heizung'] . "</td>");
	            echo ("<td>" . $r['wasser'] . "</td>");
	            echo ("</tr>");
	        }
	     ?>

	      </tbody>
	   </table>
   </div>





<?php include("includes/footer.php"); ?>