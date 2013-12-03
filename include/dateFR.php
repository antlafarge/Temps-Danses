<?php

defined ("INC") OR DIE ("403 ACCES REFUSE");

// Fonction traduisant une date en Français
function dateFR ($date)
{
	if ( strpos('-', $date) )
	{
		// Conversion date
		$date = date('l d F Y', $date);
		// Traduction du jour en Français
		$date = preg_replace ('#monday#i','Lundi',$date);
		$date = preg_replace ('#tuesday#i','Mardi',$date);
		$date = preg_replace ('#wednesday#i','Mercredi',$date);
		$date = preg_replace ('#thursday#i','Jeudi',$date);
		$date = preg_replace ('#friday#i','Vendredi',$date);
		$date = preg_replace ('#saturday#i','Samedi',$date);
		$date = preg_replace ('#sunday#i','Dimanche',$date);
		// Traduction du mois en Français
		$date = preg_replace ('#january#i','Janvier',$date);
		$date = preg_replace ('#february#i','Février',$date);
		$date = preg_replace ('#march#i','Mars',$date);
		$date = preg_replace ('#april#i','Avril',$date);
		$date = preg_replace ('#may#i','Mai',$date);
		$date = preg_replace ('#june#i','Juin',$date);
		$date = preg_replace ('#july#i','Juillet',$date);
		$date = preg_replace ('#august#i','Août',$date);
		$date = preg_replace ('#september#i','Septembre',$date);
		$date = preg_replace ('#october#i','Octobre',$date);
		$date = preg_replace ('#november#i','Novembre',$date);
		$date = preg_replace ('#december#i','Décembre',$date);
	}
	else
	{
		preg_match("#(\d{4})-(\d{2})-(\d{2}).*#", $date, $tab);
		$mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
		$date = $tab[3].' '.$mois[ $tab[2]-1 ].' '.$tab[1];
	}
	
	return $date;
}
?>