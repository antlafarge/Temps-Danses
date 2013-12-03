<?php include_once('php/start.php'); ?>


<h2>Galerie</h2>

<div class="row">
<table id="tableauGalerie" class="table-condensed">
<?php

		$_GET['dir'] = iconv("utf-8", "iso-8859-1", $_GET['dir']);
		$dossier = stripslashes('gallery/'.$_GET['dir']);
		$dossierMiniatures = $dossier.'/_min_';
		if (is_dir($dossier))
		{
			$nbPhotosParLigne = 4;
			// Création du tableau contenant la liste des dossiers
			/*$liste_fichiers = array();
			while (false !== ($entree = readdir ($dossier_ouvert)))
				$liste_fichiers[] = $entree;
			closedir ($dossier_ouvert);
			sort ($liste_fichiers);*/
			$liste_fichiers = ftp::listeFichiers($dossier);
			//site::debug($liste_fichiers);
			$count = count ($liste_fichiers);
			// Affichage du tableau contenant la liste des dossiers
			$photoCounter = 0;
			for ($nb = 0; $nb < $count ; $nb++)
			{
				// construction URL
			// PHP 5.3.0 (Wamp)
				$fichier_url = $dossier.'/'.$liste_fichiers[$nb];
				$fichier_url_encoded = str_replace('%', '%25', $fichier_url);
			// PHP 5.1.4 (Free)
				//$fichier_url = $dossier.$liste_fichiers[$nb];
				//$fichier_nom_encoded = str_replace('%', '%25', $liste_fichiers[$nb]);
				//$fichier_nom_encoded = rawurlencode($fichier_nom_encoded);
				//$fichier_url_encoded = $dossier.$fichier_nom_encoded;
				
				// Début de ligne d'images
				if ($photoCounter == 0)
					echo '<tr>';
					
				$photoCounter++;
				// Récupération de l'extension
				if (preg_match ('#\.(.+)$#i', $liste_fichiers[$nb], $tableau))
					$extension = strtolower($tableau['1']);
				// On détermine si l'extension correspond bien à une image
				if (preg_match('#jpg|jpeg|png|gif|bmp#i', $extension))
				{
					// On crée l'url de la miniature
					$fichier_url_encoded_min = $dossierMiniatures.'/'.$liste_fichiers[$nb];
					$fichier_url_encoded_min = str_replace('%', '%25', $fichier_url_encoded_min);
					$fichier_url_encoded_min = preg_replace('#\.(jpg|jpeg|png|gif|bmp)#i', '.JPG', $fichier_url_encoded_min);
					// Affichage
					//echo '<td class="miniatureGalerie"><a href="photo.php?img='.utf8_encode($fichier_url_encoded).'"><img src="'.utf8_encode($fichier_url_encoded_min).'" /><br />'.utf8_encode($liste_fichiers[$nb]).'</a></td>';
					echo '
					<td>
					<a href="photo.php?img='.utf8_encode($fichier_url_encoded).'" class="thumbnail">
						<img src="'.utf8_encode($fichier_url_encoded_min).'" alt="['.utf8_encode($fichier_url_encoded_min).']">
					</a>
					</td>';
				}
				
				// Fin de ligne d'images
				if ($photoCounter == $count)
					echo '</tr>';
				// Nouvelle ligne d'images
				elseif ($photoCounter % $nbPhotosParLigne == 0)
					echo '</tr><tr>';
			}
		}
?>

</table>
</div>

<?php include_once('php/end.php'); ?>
