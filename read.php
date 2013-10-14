<?php
    require_once("includes/main_library.php");

    $msg = "";

    $db = new SQLite3('db/database.db');
    $sql = "SELECT * FROM energie ORDER BY creationdate";
    $result = $db->query($sql);

    $row = array();
    $i = 0;
    $prevWasser = 0;


    while($res = $result->fetchArray(SQLITE3_ASSOC)) {

        $row[$i]['creationdate'] = $res['creationdate'];
        $row[$i]['electricity'] = $res['electricity'];
        $row[$i]['heating'] = $res['heating'];
        $row[$i]['water'] = $res['water'];

        if ($i > 1){
            $row[$i]['wasserGestern'] = $res['water'] - $row[$i-1]['water'];
        } else {
            $row[$i]['wasserGestern'] = "";
        }

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
	                <th>Timestap</th>
	                <th>Strom</th>
	                <th>Heizung</th>
	                <th>Wasser</th>
                    <th>Wasser Durchschnitt</th>
	             </tr>
	         </thead>
	     <tbody>

	     <?php
	         foreach ($row as $r) {

	            $datum = date("d-m-Y - H:i", $r['creationdate']);
                $wasserGestern =  $r['water'];

	            echo ("<tr>");
	            echo ("<td>" . $datum . "</td>");
	            echo ("<td>" . $r['electricity'] . "</td>");
	            echo ("<td>" . $r['heating'] . "</td>");
	            echo ("<td>" . $r['water'] . "</td>");

                echo ("<td>" . $r['wasserGestern'] . "</td>");
	            echo ("</tr>");
	        }
	     ?>

	      </tbody>
	   </table>
   </div>




<?php
    echo getHTMLFooter();
?>