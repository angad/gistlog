<html>
<head>
<title>gistlog</title>
<style>
body{
	margin:0px auto;
	width:960px;
}

#gists{
	float:left;
	width:600px;
}

#gist{
	margin:10px 0px 0px 0px;
}
</style>

</head>

<body>
<div id = "gists">
<?php 
foreach($list as $gist_files)
{
	echo '<div id = "gist"><script src="https://gist.github.com/' . $gist_files['repo'] .  '.js"> </script> <br/></div>';
}
?>
</div>

</body>
</html>