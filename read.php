<?php
    require_once("includes/main_library.php");

    $db = new SQLite3($dbFileName);
    $result = $sql = "SELECT * FROM energie ORDER BY creationdate";

    $rows = sqlite_num_rows($result);

    echo ($rows);

    $row = array();
    $i = 0;

    while($res = $result->fetchArray(SQLITE3_ASSOC)) {

        $row[$i]['creationdate'] = $res['creationdate'];
        $row[$i]['electricity'] = str_replace(".", ",", $res['electricity']);
        $row[$i]['heating'] = str_replace(".", ",", $res['heating']);
        $row[$i]['water'] = str_replace(".", ",", $res['water']);

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

</div>


<?php
    echo getHTMLFooter();
?>