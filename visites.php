<?php
require_once('include/config.php');
require_once('class/database.php');
?>

<html>
<head>

<style>
body
{
	text-align:center;
	background-color:#444;
	color:white;
}
table
{
	margin:auto;
	border-color:white;
	border-collapse:collapse;
	text-align:left;
}
tr
{
	border:2px solid white;
}
td
{
	border:1px solid white;
}
a
{
	color:white;
}
</style>

</head>
<body>

<h2 style="color:white;">Infos visites</h2>

<?php
	$res2 = database::sql_to_array("SELECT count(ip) as count FROM  visites");
	echo '<h3 style="color:white;">'.$res2['count'].' visites</h3>
	
		<table>
			<tr>
				<th>id</th>
				<th>date</th>
				<th>ip</th>
				<th>pages vues</th>
				<th>page precedente</th>
				<th>navigateur</th>
			</tr>';
		$res = database::sql_to_array("SELECT * FROM visites ORDER BY date DESC LIMIT 0,20");
		for ($i=0 ; $i<count($res) ; $i++)
		{
			echo '
				<tr>
					<td>'.$res[$i]['id'].'</td>
					<td>'.$res[$i]['date'].'</td>
					<td title="host: '.$res[$i]['adresse_hote'].'">'.$res[$i]['ip'].'</td>
					<td>'.$res[$i]['nbPagesChargees'].'</td>
					<td><a href="'.$res[$i]['page_precedente'].'">'.$res[$i]['page_precedente'].'</a></td>
					<td title="'.$res[$i]['infos_navigateur'].'">infos</td>
				</tr>';
		}
		echo '</table>';
		
?>

</body>
</html>
