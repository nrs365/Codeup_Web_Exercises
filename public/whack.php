<?php
	//adding PHP here to use a GET request to change theme and get theme name as a variable
$theme = (!isset($_GET['theme'])) ? 'whack' : $_GET['theme'];
?>
<!DOCTYPE html>
<!-- saved from url=(0028)http://codeup.dev/whack.html -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset"utf-8"="">
	<title>Whack</title>
	<link rel="stylesheet" href="http://codeup.dev/css/<?= $theme; ?>.css">
	<script src="/Whack_files/jquery.js"></script>
</head>

<body>
	<h1>Whack-a-<?= $theme?></h1> <!-- passing $theme in PHP to change main header to read with theme name instead of just 'mole'-->
	<h3 id="score"></h3>
	<br>
	<label id="theme"for="theme">Select a theme</label> <!--added a drop down menu to allow player to select theme-->
	<form class="drop_down_menu" action="">
		<select id="theme" name="theme">
		<option value="mole">Mole</option>
		<option value="Titan">Titan</option>
		<option value="Instructor">Instructor</option>
		</select>

		<button type="submit">Submit</button> <!--button for theme selection-->
	</form>
	<input id="start_button" type="button" value="start game"><!--button for game start-->
	<!-- build gameboard/frame-->
	<div id="gameboard">	
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
		<div class="box">
			<div class="item"></div>
		</div>
	</div>
	<script>
		var score = 0;
		var gameInterval;
		var speed = 1500;
			// this function creates a random empty div with a background assigned in CSS as a game piece
		function place_random_gamesquare() {
        	var random_place = Math.floor((Math.random(0,8) * 8) + 1);
        	var game_square = $('.item');
        	$(game_square[random_place]).fadeIn(200).delay(500).fadeOut(200);   
       	};
        
        	// this function starts the game by placing a random gamepiece, and (attempts) to increase the speed based on player performance
        function start_game() {
       		gameInterval = setInterval(function() {
       			// game_logic();
       			place_random_gamesquare();

       			if (score % 5 == 0 && score != 0) {
	        		clearInterval(gameInterval);
					speed -= 1000;
					gameInterval = setInterval(start_game, speed);
				}
       		}, speed);
	        return gameInterval;
        }
        	// this function sets the game time and when the game is begins and ends, clears the gameboard
        function game_time() {
        	var timeout = setTimeout(function() {
	        	clearInterval(gameInterval);
	        	$('.box').empty();
	        	alert("Time's Up! Try again!");
	        }, 30100); //adjustable game length
        }
        	// game logic
        $('#gameboard').on('click', '.item', function(){
        	$(this).fadeOut();
        	score++;
        	$('#score').text("Score: " + score);
			console.log(score);
			
        });
        	// game waits until player starts the game
        $('#start_button').click(function() {
        	start_game();
        	game_time();
        });
           
	 </script>	
</body>
</html>