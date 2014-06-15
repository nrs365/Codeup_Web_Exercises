<?php
	// if(!isset($_GET['theme']))
	// {
	// 	$theme = 'whack';
	// } else {
	// 	$theme = $_GET['theme'];
	// }

$theme = (!isset($_GET['theme'])) ? 'whack' : $_GET['theme'];
?>
<!DOCTYPE html>
<!-- saved from url=(0028)http://codeup.dev/whack.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset"utf-8"="">
	<title>Whack</title>
	<link rel="stylesheet" href="http://codeup.dev/css/<?= $theme; ?>.css">
	<script src="/Whack_files/jquery.js"></script>
	<script>
	</script>
</head>
<body>
	

	<h1>Whack-A-Mole</h1>
	<h3 id="score"></h3>
	<input id="start_button" type="button" value="start game">

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

		function place_random_gamesquare() {
		// clear all squares
			// $('.box').empty();

        	var random_place = Math.floor((Math.random(0,8) * 8) + 1);
        	var game_square = $('.item');
        	$(game_square[random_place]).fadeIn(200).delay(500).fadeOut(200);
        	// $(game_square[random_place]).html('.mole');    
       	};
        
        function start_game() {

       		gameInterval = setInterval(function() {
       			// game_logic();
       			place_random_gamesquare();

       			if (score % 5 == 0 && score != 0) {
	        		clearInterval(gameInterval);
					speed -= 1000;
					gameInterval = setInterval(start_game, speed);
				}


				// console.log(speed);
       			// console.log(gameInterval);
       		}, speed);

	        return gameInterval;
        }

        function game_time() {
        	var timeout = setTimeout(function() {
	        	clearInterval(gameInterval);
	        	$('.box').empty();
	        	alert("Time's Up! Try again!");
	        }, 15100);
        }

        $('#gameboard').on('click', '.mole', function(){
        	$(this).fadeOut();
        	score++;
        	$('#score').text("Score: " + score);
			// console.log(score);
			
        });

        $('#start_button').click(function() {
        	start_game();
        	game_time();
        });
           
	 </script>	
</body>
</html>