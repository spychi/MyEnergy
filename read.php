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

   <table class="table">
       <thead>
             <tr>
                <td>Timestap</td>
                <td>Strom</td>
                <td>Heizung</td>
                <td>Wasser</td>
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





<?php include("includes/footer.php"); ?>