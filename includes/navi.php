<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">MyEnergy</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li <?php if($activePage == "write") {echo('class="active"');} ?>><a href="write.php">Eingabe</a></li>
      <li <?php if($activePage == "read") {echo('class="active"');} ?>><a href="read.php">Ausgabe</a></li>

    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li <?php if($activePage == "setup") {echo('class="active"');} ?> ><a href="setup.php">Setup</a></li>
    </ul>
  </div>
</nav>