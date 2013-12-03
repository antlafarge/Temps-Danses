<?php

class database
{
	public static $hostName;
	public static $userName;
	public static $password;
	public static $baseName;
	public static $base;

	// init database
	public static function init ()
	{
		database::$hostName = DB_HOST;
		database::$userName = DB_USER;
		database::$password = DB_PASS;
		database::$baseName = DB_BASE;

		mysql_connect(self::$hostName, self::$userName, self::$password);
		mysql_select_db(self::$baseName);
	}

	// execute sql
	function sql ($requete)
	{
		if(!self::$base)
			self::init();
		
		return @mysql_query($requete);
	}

	// execute sql and return to array
	function sql_to_array ($requete)
	{
		$res = self::sql($requete);
		$tab = array();
		while ($row = @mysql_fetch_array($res))
		{
			$tab[] = $row;
		}
		if (count($tab) == 1)
			return $tab[0];
		else
			return $tab;
	}
}

?>
