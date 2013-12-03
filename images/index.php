<?php
header ("Content-type: text/html; charset=utf-8");

// Cacher les Notices
error_reporting(E_ALL ^ E_NOTICE);

define ("INC", 1);

// Inclusions
require_once('./include/config.php');
require_once('./class/site.php');
require_once('./class/database.php');
require_once('./class/tracker.php');
require_once('./class/ftp.php');
require_once('./include/login.php');

site::chargerStyle();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Véronique Lhermitte" />
	<meta name="description" content="danses sportive" />
	<meta name="generator" content="Notepad++" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" media="screen" type="text/css" title="Actuel" href="./style/<?php echo $_SESSION['style'] ?>.css" />
	<title>Temps Danses Fressenneville</title>
</head>

<body>

<div id="global">
<div id="site">

<div id="banniere"></div>

<div id="menuHorizontal">
	<?php
		site::charger_menu( 'menuHorizontalHaut' );
	?>
</div>

<div id="corps">
	<div id="page">
		<?php
			site::inclurePage();
		?>
	</div>
</div>

<div id="pied">
	Temps Danses © 2010
</div>

</div>
</div>

</body>
</html>
