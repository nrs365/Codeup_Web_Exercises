<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>First Form</title>
</head>
<body>
	
	<?php
		echo "<h4>GET</h4>";
		var_dump($_GET);
		echo "<h4>POST</h4>";
		var_dump($_POST);
	?>
	
	<form method="GET" action="/proces_form.php">
    	<p>
       		<label for="username">Username</label>
       		<input id="username" name="username" type="text" placeholder="username">
   		</p>
   		<p>
       		<label for="password">Password</label>
       		<input id="password" name="password" type="password" placeholder="password" required>
    	</p>
    	<p>
       		<button type="submit">Log in</button>
    	</p>
	</form>
</body>
</html>