<?php

defined ("INC") OR DIE ("403 ACCES REFUSE");

session_start();

// Déconnexion
if (isset ($_GET['logout']))
{
	unset ($_SESSION['id']);
	unset ($_SESSION['pseudo']);
	unset ($_SESSION['email']);
	unset ($_SESSION['rang']);
	setcookie ("id", $_SESSION['id'], time()-24*3600);
	header ("Location: ./index.php5");
}

// Connexion par cookie
elseif (!isset ($_SESSION['id']) AND isset ($_COOKIE['id']))
{
	$id = trim(htmlspecialchars($_COOKIE['id']));
	$membre = database::sql_to_array("SELECT COUNT(id) AS nb, id, pseudo, email, rang FROM membres WHERE id='$id' GROUP BY pseudo");
	if ($membre['nb'] == 1)
	{
		$_SESSION['id'] = $membre['id'];
		$_SESSION['pseudo'] = $membre['pseudo'];
		$_SESSION['email'] = $membre['email'];
		if ($membre['rang'])
			$_SESSION['rang'] = 1;
		// Redirection vers accueil si OK
		header ("Location: ./index.php5");
	}
}

// Connexion par authentification
elseif (!empty ($_POST['login']) AND !empty ($_POST['mot_de_passe']))
{
	// Test connexion par mail
	if ( preg_match ('!^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$!i', $_POST['login']) )
		$email = true;
	$login = trim(htmlspecialchars($_POST['login']));
	$motdepasse = trim(htmlspecialchars($_POST['mot_de_passe']));
	if (!$email)
		$membre = database::sql_to_array("SELECT COUNT(id) AS nb, id, pseudo, email, pass, rang FROM membres WHERE pseudo='$login' GROUP BY pseudo");
	else
		$membre = database::sql_to_array("SELECT COUNT(id) AS nb, id, pseudo, email, pass, rang FROM membres WHERE email='$login' GROUP BY pseudo");
	if ($membre['nb'] == 1)
	{
		$motdepasse = sha1($motdepasse);
		if ($motdepasse == $membre['pass'])
		{
			$_SESSION['id'] = $membre['id'];
			$_SESSION['pseudo'] = $membre['pseudo'];
			$_SESSION['email'] = $membre['email'];
			if ($membre['rang'])
				$_SESSION['rang'] = 1;
			if ($_POST['cookie'] == 'on')
				setcookie ("id", $_SESSION['id'], time()+365*24*3600);
			// redirection vers accueil si OK
			header ("Location: ./index.php5");
		}
		else
			$erreur = 1;
	}
	else
		$erreur = 1;
	
	// redirection si erreur
	if ($erreur)
		header ("Location: ./index.php5?page=login&erreur=1");
}

?>
