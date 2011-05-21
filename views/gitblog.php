<html>
<head>
<title>'s gistlog</title>
</head>

<body>

<?php 
foreach($list as $gist_files)
{
	echo '<script src="https://gist.github.com/' . $gist_files['repo'] .  '.js"> </script> <br/>';
}
?>

</body>
</html>