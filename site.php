<?php

class site
{
	// Fonction principale du site vérifiant la page a inclure et l'incluant si elle est correcte
	public static function chargerStyle ()
	{
		// CHANGEMENT DU STYLE
		if ( isset($_GET['style']) AND !empty($_GET['style']) ) // Si un changement de style doit etre effectué
		{
			setcookie ('style', $_GET['style'], time()+365*3600);
			$_SESSION['style'] = $_GET['style'];
		}
		elseif ( !isset($_SESSION['style']) AND isset($_COOKIE['style']) AND !empty ($_COOKIE['style']) ) // Si un cookie de changement de style est trouvé
			$_SESSION['style'] = $_COOKIE['style'];
		elseif ( !isset($_SESSION['style']) ) // Style par défaut
			$_SESSION['style'] = 'default';
	}
	
	// Fonction principale du site vérifiant la page a inclure et l'incluant si elle est correcte
	public static function inclurePage()
	{
		// Si $_GET['page'] n'existe pas ou est vide, on vérifie $_POST['page']
		if ( isset($_POST['page']) AND !empty($_POST['page']) )
			$page = trim(htmlspecialchars($_POST['page']));
		elseif ( isset($_GET['page']) AND !empty($_GET['page']) )
			$page = trim(htmlspecialchars($_GET['page']));
			
		if ( file_exists('./page/'.$page.'.php') AND !strpos($page, "..") )
			include ('./page/'.$page.'.php');
		else
			include ('./page/presentation.php');
	}

	// affiche un message de debug, avec la trace d'exécution
	public static function debug($message)
	{
		if (DEBUG == true)
		{
			echo "<pre class='debug'>";
			
			echo "<b>";
			print_r($message);
			echo "</b>\n";
			
			echo self::trace(debug_backtrace());
			
			echo "</pre>";
		}
		else
			return;
	}
	
	
	public static function charger_menu( $noeudAParser )
	{
		$dom = new DomDocument;
		$dom->load('./data/menus.xml');
		$menu = $dom->getElementsByTagName($noeudAParser);
		foreach($menu as $tabMenu)
		{
			$listeElements = $tabMenu->getElementsByTagName('element');
			foreach($listeElements as $elementMenu)
			{
				if ( $elementMenu->hasAttribute('type') )
				{
					$type = $elementMenu->getAttribute('type');
					switch ($type)
					{
						case 'titre':
							$titre = $elementMenu->firstChild->data;
							if ( ! empty($titre) )
								echo '<div class="menuElementTitre">'.$titre.'</div>';
							break;
						case 'lien':
							$lien = $elementMenu->getAttribute('lien');
							$text = $elementMenu->firstChild->data;
							if ( ! empty($lien) AND ! empty($text) )
								echo '<div><a class="menuElementClicable" href="'.$lien.'">'.$text.'</a></div>';
							break;
						case 'texte':
							$text = $elementMenu->firstChild->data;
							if ( ! empty($text) )
								echo '<div class="menuElement">'.$text.'</div>';
							break;
						case 'page':
							$page = $elementMenu->getAttribute('page');
							$text = $elementMenu->firstChild->data;
							if ( ! empty($page) AND ! empty($text) )
								echo '<div><a class="menuElementClicable" href="./index.php?page='.$page.'">'.$text.'</a></div>';
							break;
					}
				}
			}
		}
	}
	
	
	/**
	* affiche la trace d'exécution courante
	*
	* $backtrace : retour d'un debug_backtrace lors de l'appel à debug
	* si NULL, inclus l'appel de debug dans la trace d'exécution
	*/
	function trace($backtrace){
	 
		$chaine='';
		if($backtrace)
			$trace=array_reverse($backtrace);
		else
			$trace=array_reverse(debug_backtrace());
		$fonction=NULL;
		$decalage='';
		foreach($trace as $appel){
	 
			$chaine.= $decalage.$appel['file'].', ligne '.$appel['line'];
			if($fonction){
				$chaine.=" : $fonction()\n";
				$decalage="  ".$decalage;
			}else{
				$decalage="  +--";
				$chaine.= "\n";
			}
	 
			$fonction=$appel['function'];
	 
		}
		return $chaine;
	}
 
	/**
	* redirige l'utilisateur vers une URL
	* A UTILISER AVANT UN AFFICHAGE 
	*
	* $url : page de redirection
	* $message : message à passer dans la nouvelle page
	* $type : type de message
	*/
	function redirection($url,$message=NULL,$type=NULL){
		if($message)
			self::passer_message_info($message,$type);
		header("Location: $url");
	}
	 
	/**
	* vérifie si un message d'info existe
	*/
	function existe_message_info(){
		self::debug($_SESSION);
		return isset($_SESSION["messages"]);
	}
	 
	/**
	* affiche les éventuels messages d'infos stockés
	* et les supprime
	*/
	function message_info(){
		self::debug($_SESSION);
		foreach($_SESSION["messages"] as $message=>$type){
			self::message($message,$type);
		}
		self::effacer_message_info();
	}
	 
	/**
	*
	*/
	function ajouter_message_info($message,$type){
		$_SESSION["messages"][$message]=$type;
	}
	 
	/**
	* stocke un message d'info
	*/
	function effacer_message_info(){
		unset($_SESSION["messages"]);
	}
}

?>
