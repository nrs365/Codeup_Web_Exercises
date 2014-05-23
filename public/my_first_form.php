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
	
	<form method="GET">
    	<h2>User Login</h2>
    	<p>
       		<label for="username">Username</label>
       		<input id="username" name="username" type="text" placeholder="username" maxlength="3">
   		</p>
   		<p>
       		<label for="password">Password</label>
       		<input id="password" name="password" type="password" placeholder="password" required>
    	</p>
    	<p>
       		<button type="submit">Log in</button>
    	</p>
    	<p>
    		<textarea name="post_body" rows="5" cols="120"></textarea>
	</form>
	<form method="GET">
		<h2>Compose an email</h2>
		<p>
			<label for="to">To:</lable>
			<input id="to" name="to" type="text" placeholder="recipient" required>
		</p>
		<p>
			<lable for="from">From:</lable>
			<input id="from" name="from" type="text" placeholder="sender" required>
		</p>
		<p>
			<lable for="subject">Subject:</lable>
			<input id="subject" name="subject" type="text">
		</p>
		<p>
			<lable for="body">Body</lable>
			<textarea name="body" rows="5" cols="50"></textarea>
		</p>
		<p>
			<lable for="save">Would you like to save a copy to your sent folder?</lable>
			<input type="checkbox" id="save" name="save" value="yes" checked>
		</p>
		<p>
			<button type="submit">Send</button>
		</p>			 
	</form>	
	<form>
		<h2>Multiple Choice Test</h2>
		<p>Who would I rather be reading?</p>
		<p>
			<lable for="camus">Albert Camus</lable>
			<input type="radio" id="camus" name="writers" value="camus">
		</p>
		<p>
			<lable for="salinger">J.D. Salinger</lable>
			<input type="radio" id="salinger" name="writers" value="salinger">
		</p>
		<p>
			<lable for="cisneros">Sandra Cisneros</lable>
			<input type="radio" id="cisneros" name="writers" value="cisneros">
		</p>		
	</form>	
</body>
</html>