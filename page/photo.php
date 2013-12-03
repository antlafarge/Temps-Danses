<h2>Image</h2>

<table>
<?php
	// Affichage
	$arr = explode('/', $_GET['img']);
	$arrSize = sizeof($arr);
	$imgStr = $arr[$arrSize-1];
	echo '<tr><td class="photoGalerie"><img src="'.$_GET['img'].'" /><br />'.$imgStr.'</td></tr>';
?>
</table>

<a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retour</a>
