<?php
    require_once("includes/main_library.php");

    $msg = "";

    $db = new SQLite3($dbFileName);
    $sql = "SELECT * FROM energie ORDER BY creationdate";
    $result = $db->query($sql);

    $row = array();
    $i = 0;

    while($res = $result->fetchArray(SQLITE3_ASSOC)) {

        $row[$i]['creationdate'] = $res['creationdate'];
        $row[$i]['electricity'] = $res['electricity'];
        $row[$i]['heating'] = $res['heating'];
        $row[$i]['water'] = $res['water'];

        $i++;
    }



    echo getHTMLHeader("read");
    echo getNavi("read");
?>

<div class="panel panel-default">

  <div class="panel-heading">Übersicht</div>
	   <table class="table">
	       <thead>
	             <tr>
	                <th>Ablesedatum</th>
	                <th>Strom <span>[kW/h]</span></th>
	                <th>Heizung<span>[kW/h]</span></th>
	                <th>Wasser<span>[m<sup>3</sup>]</span></th>
	             </tr>
	         </thead>
	     <tbody>

	     <?php
	         foreach ($row as $r) {

	            //$datum = date("d-m-Y - H:i", $r['creationdate']);
                $wasserGestern =  $r['water'];

	            echo ("<tr>");
	            echo ("<td>" . $r['creationdate'] . "</td>");
	            echo ("<td>" . $r['electricity'] . "</td>");
	            echo ("<td>" . $r['heating'] . "</td>");
	            echo ("<td>" . $r['water'] . "</td>");
	            echo ("</tr>");
	        }
	     ?>

	      </tbody>
	   </table>
   </div>




<?php
    echo getHTMLFooter();
?>