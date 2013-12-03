<?php

$arr = explode('/', $_SERVER['REQUEST_URI']);
$end = end($arr);
$arr = explode('.', $end);
$current_page = $arr[0];

include_once('php/navbar.php');
include_once('php/ftp.php');

?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Temps Danses Fressenneville</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<link rel="icon" type="image/png" href="images/favicon.png" />

    <style>
    	.navbar-default { background-color:#F778A1; }
    	.navbar-default .navbar-brand { color:white; text-shadow:black 0.1em 0.1em 0.2em; }
    	.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus { color:white; text-shadow:none; }
    	.navbar-default .navbar-nav > li > a { color:white; text-shadow:black 0.1em 0.1em 0.2em; }
    	.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus { color:white; text-shadow:none; }
	    .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus { color:#F778A1; background-color:white; text-shadow:white 0.1em 0.1em 0.2em; font-weight:bold; }
	    body { background-image:url('images/ecailles.png'); padding-top:64px; padding-bottom:32px; }

      .text-justified { text-align:justify; }

		  /*.navbar .nav > .active > a,
		  .navbar .nav > .active > a:hover,
		  .navbar .nav > .active > a:focus { background-color:#bdf; }

	    .thumbnail { display:table-cell; width:160px; height:105px; text-align:center; }
	    .thumbnail a { display:block; width:160px; height:105px; text-align:center; }
	    .thumbnail img { max-width:160px; height:90px; }*/
    </style>

  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href=".">Temps Danses</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="<?php treatActivePage('presentation', $current_page); ?>"><a href="presentation.php"><span class="glyphicon glyphicon-home"></span> Présentation</a></li>
          <li class="<?php treatActivePage('tarifs', $current_page); ?>"><a href="tarifs.php"><span class="glyphicon glyphicon-euro"></span> Tarifs</a></li>
          <li class="<?php treatActivePage('horaires', $current_page); ?>"><a href="horaires.php"><span class="glyphicon glyphicon-time"></span> Horaires</a></li>
          <li class="<?php treatActivePage('manifestations', $current_page); ?>"><a href="manifestations.php"><span class="glyphicon glyphicon-glass"></span> Manifestations</a></li>
          <li class="<?php treatActivePage('annonces', $current_page); ?>"><a href="annonces.php"><span class="glyphicon glyphicon-bullhorn"></span> Annonces</a></li>
          <!--<li class="<?php treatActivePage('inscription', $current_page); ?>"><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>-->
          <li class="<?php treatActivePage('contact', $current_page); ?>"><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
          <li class="dropdown <?php treatActivePage('gallery', $current_page); ?> <?php treatActivePage('photo', $current_page); ?> <?php treatActivePage('videos', $current_page); ?>">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-picture"> Medias <b class="caret"></b></a>
        	<ul class="dropdown-menu">
        		<li><a href="videos.php"><span class="glyphicon glyphicon-film"></span> Vidéos</a></li>
          		<li class="divider"></li>
          		<li><a href="#"><span class="glyphicon glyphicon-picture"> Photos</span></a></li>
        		<?php
					$dirs = ftp::listeDossiers('gallery', false);
					for ($i=0; $i<count($dirs); $i++)
					{
          				echo '<li><a href="gallery.php?dir='.$dirs[$i].'"><span class="glyphicon glyphicon-picture"> '.$dirs[$i].'</a></li>';
					}
        		?>
        	</ul>
      	  </li>
		  <li class="dropdown">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-link"></span> Liens <b class="caret"></b></a>
        	<ul class="dropdown-menu">
				<li><a href="http://www.ffdanse.fr/">Fédération française de danse (FFD)</a></li>
        	</ul>
      	  </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

    <!--<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href=".">Antoine Lafarge dev book</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li <?php treatActivePage('home', $current_page); ?>><a href="home.php">Home</a></li>
              <li <?php treatActivePage('experiences', $current_page); ?>><a href="experiences.php">Experiences</a></li>
              <li <?php treatActivePage('projects', $current_page); ?>><a href="projects.php">Projects</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>-->

  <div class="container">
