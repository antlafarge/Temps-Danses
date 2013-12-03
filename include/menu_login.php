<?php

defined ("INC") OR DIE ("403 ACCES REFUSE");

if ( isset($_SESSION['id']) )
{
	echo '<div class="titre">'.$_SESSION['pseudo'].'</div>
		<a href="./index.php5?page=membre&id='.$_SESSION['id'].'">Mon compte</a>
		<a href="./index.php5?page=statistiques&id='.$_SESSION['id'].'">Mes stats</a>
		<a href="./index.php5?logout=1">Deconnexion</a>
	';
}
else
{
	echo '
		<div class="titre">Connexion</div>
		<form method="POST">
			<input class="element" type="hidden" name="page" value="login" />
			<input class="element" type="text" name="login" value="pseudo" />
			<input class="element" type="password" name="mot_de_passe" value="mdpmdp" />
			<div class="element"><label><input type="checkbox" name="cookie" /> se souvenir</label></div>
			<input class="element" type="submit" value="se connecter" />
		</form>
		<a href="./index.php5?page=inscription">Inscription</a>
	';
}

?>
