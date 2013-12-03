<?php include_once('php/start.php'); ?>

<h2>Photo</h2>

<?php
	$exploded = explode('/', $_GET['img']);
	$filename = array_pop($exploded);

	echo '	
	<a href="'.$_GET['img'].'">
		<img class="img-thumbnail" style="max-width:100%; max-height:80%;" src="'.$_GET['img'].'">
	</a>
	';
?>

<?php include_once('php/end.php'); ?>

