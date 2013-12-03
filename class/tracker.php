<?php

class tracker
{
	// enregistrer une nouvelle visite
	public static function record()
	{
		$ip = $_SERVER["REMOTE_ADDR"];
		// Premiere visite, on enregistre la visite
		if ( !$_SESSION['visiteur'] )
		{
			//$currentDate = date('d/m/Y H\hi\ms\s');
			$adresseHote = gethostbyaddr($ip);
			database::sql("INSERT INTO visites(date, ip, nbPagesChargees, page_precedente, adresse_hote, infos_navigateur)
			VALUES (NOW(), '$ip', '1', '{$_SERVER["HTTP_REFERER"]}', '$adresseHote', '{$_SERVER["HTTP_USER_AGENT"]}')");
			
			$_SESSION['visiteur'] = true;
		}
		// On incrémente le compteur de pages chargées
		else
		{
			database::sql("UPDATE visites SET nbPagesChargees=nbPagesChargees+1 WHERE ip = '$ip' ORDER BY date DESC LIMIT 1");
		}
	}
}
?>
