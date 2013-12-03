<h2>Newsletter</h2>

<?php
$active = trim(htmlspecialchars($_GET['active']));
$email = trim(htmlspecialchars($_GET['email']));
if ( !empty($email) )
{
	if ( preg_match ('!^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$!i', $email) )
	{
		if ($active == 'on')
		{
			database::sql( "INSERT INTO newsletter (email) VALUES ('$email')" );
			echo '<div class="info">'.$email.' est inscrit à la newsletter !</div>';
		}
		else
		{
			database::sql( "DELETE FROM newsletter WHERE email='$email'" );
			echo '<div class="info">'.$email.' est désinscrit de la newsletter !</div>';
		}
	}
	else
	{
		echo '<div class="erreur">Erreur : Adresse e-mail incorrecte !</div>';
	}
}
?>

<p>
	<form method="GET">
		<input type="hidden" name="page" value="newsletter" />
		email : <input type="text" name="email" /><br />
		Incription : <input type="checkbox" name="active" /><br />
		<input type="submit" />
	</form>
</p>
