<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-stats"></span> MyEnergy</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li <?php if($activePage == "write") {echo('class="active"');} ?>><a href="write.php"></span> Eingabe</a></li>
      <li <?php if($activePage == "read") {echo('class="active"');} ?>><a href="read.php"></span> Ausgabe</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span> Tools <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li <?php if($activePage == "export") {echo('class="active"');} ?>><a href="export.php">CSV Im/Export</a></li>
                <li <?php if($activePage == "setup") {echo('class="active"');} ?>><a href="setup.php">DB Setup</a></li>
            </ul>
        </li>
    </ul>
  </div>
</nav>
<div class="container">
