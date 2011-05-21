<html>
<head>
<title>Gitme Login</title>
</head>

<body>

<?php echo form_open('user/login'); ?>
			<p><h4>Username</h4><input type = "text" class = "formelem" name = "username" value = "" size = "50" /></p>
			<p><h4>Password</h4><input type = "password" class = "formelem" name = "password" value = "" size = "50" /></p>
			<p><input type = "submit" value = "Login" /></p>
		</form>
</body>
</html>
