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
			<label for="to">To:</label>
			<input id="to" name="to" type="text" placeholder="recipient" required>
		</p>
		<p>
			<label for="from">From:</label>
			<input id="from" name="from" type="text" placeholder="sender" required>
		</p>
		<p>
			<label for="subject">Subject:</label>
			<input id="subject" name="subject" type="text">
		</p>
		<p>
			<label for="body">Body</label>
			<textarea name="body" rows="5" cols="50"></textarea>
		</p>
		<p>
			<label for="save">Would you like to save a copy to your sent folder?</label>
			<input type="checkbox" id="save" name="save" value="yes" checked>
		</p>
		<p>
			<button type="submit">Send</button>
		</p>			 
	</form>	
	<form method="GET">
		<h2>Multiple Choice Test</h2>
		<p>1.) Who would I rather be reading?</p>
		<p>
			<label for="camus">
				<input type="radio" id="camus" name="writers" value="camus">Albert Camus
			</label>	
		</p>
		<p>
			<label for="salinger">
				<input type="radio" id="salinger" name="writers" value="salinger">J.D.Salinger
			</label>	
		</p>
		<p>
			<label for="cisneros">
				<input type="radio" id="cisneros" name="writers" value="cisneros">Sandra Cisneros
			</label>
		</p>
		<p>2.) Which language do I enjoy studying the most?</p>
		<p>
			<label for="french">
				<input type="radio" id="french" name="languages" value="french">French
			</label>	
		</p>
		<p>
			<label for="spanish">
				<input type="radio" id="spanish" name="languages" value="spanish">Spanish
			</label>	
		</p>
		<p>
			<label for="japanese">
				<input type="radio" id="japanese" name="languages" value="japanese">Japanese
			</label>
		</p>
		<p>3.) Which of these games did I waste as much of my life as possible playing?</p>
		<p>
			<label for="mario/duckhunt">
				<input type="checkbox" id="mario/duckunt" name="games[]" value="mario/duckhunt">Super Mario Bro/Duckhunt
			</label>	
		</p>
		<p>
			<label for="SMB2">
				<input type="checkbox" id="SMB2" name="games[]" value="SMB2">Super Mario Bros. 2
			</label>
		</p>
		<p>
			<label for="SMB3">
				<input type="checkbox" id="SMB3" name="games[]" value="SMB3">Super Mario Bros. 3
			</label>	
		</p>
		<p>
			<label for="melee">
				<input type="checkbox" id="melee" name="games[]" value="melee">Super Smash Bros. Melee
			</label>	
		</p>
		<p>
			<label for="brawl">
				<input type="checkbox" id="brawl" name="games[]" value="brawl">Super Smash Bros. Brawl
			</label>
		</p>
		<p>
			<label for="jobs">Which of these have been my previous jobs? (Select all that apply) </label>
			<select id="jobs" name="jobs[]" multiple>
    			<option value="quiznos">Quiznos</option>
    			<option value="northsideISD">Subsitute for Northside ISD</option>
    			<option value="petsmart">PetsMart</option>
    			<option value="English tutor">English tutor</option>
    			<option value="bby152">Best Buy</option>
    			<option value="chef">Chef</option>
			</select>
		</p>	
		<p>	
			<button type="submit">Submit!</button>
		</p>	
	</form>
	<form method="GET">
		<h2>Select Testing</h2>
		<p>
			<label for="stars" name="stars">Were most of your stars out?</label>
			<select id="stars" name="stars">
				<option value="1">Yes</option>
				<option value="0">No</option>
			</select>
		</p>	
		<br>
		<p>
			<label for="writing">Were you busy writing your heart out?</label>
			<select id="writing" name="writing">
				<option value="1">Yes</option>
				<option value="0">No</option>
			</select>
		</p>	
		<p>
			<button type="submit">Submit!</button>
		</p>	
</body>
</html>