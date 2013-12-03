<h3>Galerie</h3>

<table id="tableauGalerie">
<?php
	echo '<table>';
	$dossiers = ftp::listeDossiers('./photos', false);
	for ( $i=0 ; $i<count($dossiers) ; $i++)
	{
		echo '<tr><td style="font-weight:bold;"><a style="color:blue;" href="./index.php?page=galerie&dossier='.$dossiers[$i].'">'.$dossiers[$i].'</a></td></tr>';
	}
	echo '</table>';
?>
