<?php

    function getNavi ($activePage) {

        $navi['write'] = "";
        $navi['read'] = "";
        $navi['weather'] = "";
        $navi['costs'] = "";
        $navi['export'] = "";
        $navi['setup'] = "";

        switch ($activePage) {
            case "write":
                $navi['write'] = 'class="active"';
                break;
            case "read":
                $navi['read'] = 'class="active"';
                break;
            case "weather":
                $navi['weather'] = 'class="active"';
                break;
            case "costs":
                $navi['costs'] = 'class="active"';
                break;
            case "export":
                $navi['export'] = 'class="active"';
                break;
            case "setup":
                $navi['setup'] = 'class="active"';
                break;
        }


    $return = '
           <nav class="navbar navbar-default" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="wetter.php"><span class="glyphicon glyphicon-stats"></span> MyEnergy</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li '.$navi['write'].'><a href="write.php"></span> Eingabe</a></li>
              <li '.$navi['read'].'><a href="read.php"></span> Ausgabe</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span> Tools <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li '.$navi['weather'].'><a href="weather.php">Wetter</a></li>
                        <li '.$navi['costs'].'><a href="costs.php">Kosten bearbeiten</a></li>
                        <li '.$navi['export'].'><a href="export.php">CSV Im/Export</a></li>
                        <li '.$navi['setup'].'><a href="setup.php">DB Setup</a></li>
                    </ul>
                </li>
            </ul>
          </div>
        </nav>
        <div class="container">
    ';

    return $return;

    }


