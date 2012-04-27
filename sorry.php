<?php

ini_set("arg_separator.output", "&");
ini_set("url_rewriter.tags", "a=href,area=href,frame=src,input=src");
	
session_name("SORRY!");

session_start(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'/>
		<title>Sorry!</title>
		<link rel='stylesheet' type='text/css' href='css/style.css'/>
		<link rel='stylesheet' type='text/css' href='css/ui-darkness/jquery-ui-1.8.18.custom.css'>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
		<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js'></script>
		<script src='modules/sorryMaster.js'></script>
		<script src='modules/sorryBoard.js'></script>
		<script src='modules/sorryPawn.js'></script>
		<script src='modules/sorryPlayer.js'></script>
		<script src='modules/sorryMain.js'></script>
		<script>
			$(function() {
				$("#accordion").accordion({
					autoHeight : false,
					navigation : true,
					collapsible : true,
				});
			});

		</script>
	</head>
	<body>
		<div id="gameContainer">
			<div id="boardContainer">
				<canvas id="myCanvas" width="640" height="640">
					Your Browser does not support canvas. upgrade
				</canvas>
				<div id="boardOverlay"></div>
			</div><!-- board container-->
			<div id="accordion">
				<h3><a href="#">Game</a></h3>
				<div>
					<fieldset>			
  				<?php include("login.php");?>
					</fieldset>
					<form>
						<fieldset>
							<label for="color">Color</label>
							<select id="color">
								<option value="blue">Blue</option>
								<option value="green">Green</option>
								<option value="yellow">Yellow</option>
								<option value="red">Red</option>
							</select>
						</fieldset>
						<fieldset>
							<label for="easyDiff">Easy </label>
							<input type="radio" name="diffLevel" value="easy" checked="checked" id="easyDiff"/>
							<br/>
							<label for="hardDiff">Hard </label>
							<input type="radio" name="diffLevel" value="hard" id="hardDiff"/>
						</fieldset>
						<? if ($_SESSION['loggedIn'] == true){ ?>
						<fieldset>
							<button id="startGame">
								Start Game
							</button>
							<br/>
							<br/>
							<button id="drawCard">
								Draw Card --- For Testing Purposes
							</button>
						</fieldset>
						<?}?>
					</form>
				</div>
				<h3><a href="#">Rules</a></h3>
				<div id="rules">
					<h2>Introduction</h2>
					<p>
						<cite> Sorry!</cite> is an excellent board game that is simple to
						learn and play, but has enough detail in it to be fun even for people
						who like complex strategy. It plays very quickly, and is a good warm-up
						game for groups of four.
					</p>
					<p>
						This document is a quick summary of the rules. The idea is to
						familiarize the reader with this game so that any references made to the
						game by other documents will be understood. This document assumes that
						the only variation of this game worth discussing is the "variation for
						adults," or "tournament version."
					</p>
					<h2>What's in a <cite>Sorry!</cite> Set?</h2>
					<h3>The Board</h3>
					<p>
						The board for <cite>Sorry!</cite> looks mostly like this:
					</p>
					<p>
						It has several important features.
					</p>
					<h4>The Start Spaces</h4>
					<p>
						You start out with all four of your pawns
						on your Start.
					</p>
					<h4>The Open Track</h4>
					<p>
						The squares around the edge of the board are called the open track.
						This is where most movement occurs during the game.
					</p>
					<h4>The Slides</h4>
					<p>
						Some parts of the open track have "slides" on them.
						The triangular ends of the slides are the start of each slide.
						The circular ends of the slides are the end of each slide.
						More about using slides, later.
					</p>
					<h4>The Safety Zones</h4>
					<p>
						The safety zones are the colored squares leading to your home.
						You may only enter your own safety zone.
						You must enter it from where it joins to the open track.
						While one of your pawns is in your safety zone,
						no other player can affect that pawn.
					</p>
					<h4>The Home Spaces</h4>
					<p>
						The ultimate goal of the game
						is to get all four of your pawns
						onto your Home space.
						More about Home under "How do You Win...".
					</p>
					<h3>The Pawns</h3>
					<p>
						Each player has four pawns of a color that matches the side
						of the board in front of that player.
						These pawns all start out on the Start space
						of their respective color.
					</p>
					<h3>The Cards</h3>
					<p>
						A <cite>Sorry!</cite> deck is very similar to a poker deck,
						except for these differences:
					</p>
					<ul>
						<li>
							There are no jokers
						</li>
						<li>
							There are no 6's
						</li>
						<li>
							There are no 9's
						</li>
						<li>
							Aces count as 1's
						</li>
						<li>
							Jacks are replaced by 11's
						</li>
						<li>
							Queens are replaced by 12's
						</li>
						<li>
							Kings are replaced by "Sorry!" cards
						</li>
					</ul>
					<h2><a name="howtoplay">How</a> do You Play <cite>Sorry!</cite>?</h2>
					<h3>Setting Up</h3>
					<ol>
						<li>
							Shuffle the deck.
						</li>
						<li>
							Deal five cards face down to each player.
						</li>
						<li>
							Place the remaining deck face down in the middle of the board.
						</li>
						<li>
							Place the four pawns of each color on the Start of that color.
						</li>
						<li>
							Pick a player to go first.
						</li>
					</ol>
					<h3>On Your Turn</h3>
					<ol>
						<li>
							Select one card from your hand.
						</li>
						<li>
							Play it onto the discard pile.
						</li>
						<li>
							Move one of your pawns according to its instructions.
							If you cannot move any of your pawns according to those
							instructions, that card has no effect.
						</li>
						<li>
							Draw a new card and add it to your hand.
						</li>
						<li>
							If any player's pawn ends a turn at the start of a slide
							that is <em>a different player's color</em>, that pawn slides
							to the end of that slide. Any pawns in the middle of the slide
							are sent back to their respective Starts.
						</li>
						<li>
							If any player's pawn ends a turn on a square that is occupied
							by another pawn, the pawn that was landed on is sent back to the
							appropriate Start.
					</ol>
					<h3>The Meanings of the Cards</h3>
					<dl compact>
						<dt>
							1
						</dt>
						<dd>
							Move a pawn from your Start to just outside it,
							<br>
							OR
							<br>
							move a pawn forward one square.
						</dd>
						<dt>
							2
						</dt>
						<dd>
							Move a pawn from your Start to just outside it,
							<br>
							OR
							<br>
							move a pawn forward two squares.
							<br>
							In addition, even if you did not move, take another turn after this one.
						</dd>
						<dt>
							3
						</dt>
						<dd>
							Move a pawn forward three squares.
						</dd>
						<dt>
							4
						</dt>
						<dd>
							Move a pawn <strong>backward</strong> four squares.
						</dd>
						<dt>
							5
						</dt>
						<dd>
							Move a pawn forward five squares.
						</dd>
						<dt>
							7
						</dt>
						<dd>
							Move a pawn forward seven squares,
							<br>
							OR
							<br>
							split the move between two pawns,
							moving them forward a <em>total</em> of seven squares.
						</dd>
						<dt>
							8
						</dt>
						<dd>
							Move a pawn forward eight squares.
						</dd>
						<dd></dd>
						<dt>
							10
						</dt>
						<dd>
							Move a pawn forward ten squares,
							<br>
							OR
							<br>
							move a pawn <strong>backward</strong> one square.
						</dd>
						<dt>
							11
						</dt>
						<dd>
							Move a pawn forward eleven squares,
							<br>
							OR
							<br>
							you may switch one of your pawns that is on the open track
							with any pawn of another color that is also on the outer track.
						</dd>
						<dt>
							12
						</dt>
						<dd>
							Move a pawn forward twelve squares.
						</dd>
						<dt>
							Sorry!
						</dt>
						<dd>
							Take a pawn off your Start,
							place it on any open track space that is occupied by an opponent's pawn,
							and send the opposing pawn back to Start.
						</dd>
					</dl>
					<h3>The "Safety Zone" and "Home"</h3>
					<p>
						You may enter your safety zone only by moving forward.
						You may leave the safety zone by moving backwards,
						but not via any other card effect.
						In other words,
						pawns in your safety zone cannot be affected by
						Sorry cards or elevens.
					</p>
					<p>
						You may also leave the safety zone
						by landing on your Home by exact count.
						Pawns on your Home are essentially
						out of the game,
						and are not affected by
						any card or movement rules.
					</p>
					<h2>How do You Win a Game of <cite>Sorry!</cite>?</h2>
					<p>
						If you get all four of your pawns
						onto your Home, you win!
					</p>
				</div>
				<h3><a href="#">Hints</a></h3>
				<div>
					<ul>
						<li>
							Don't be a noob
						</li>
						<li>
							Follow the rules
						</li>
					</ul>
				</div>
			</div>
		</div><!-- Game Container-->
		<script>
			/**
			 Sorry.gameBoard module
			 Draws game board using html5 canvas.

			 @author Andrew Cohen

			 */

			//var Sorry = {};

			Sorry.gameBoard = (function() {

				var canvas = document.getElementById("myCanvas");
				var context = canvas.getContext("2d");

				var topLeftCornerX = 0, topLeftCornerY = 0,
				//block dimensions
				width = canvas.width / 16, height = canvas.height / 16;

				/*
				 @param topLeftCornerX {Integer} top left corner of rectangle x coordinate
				 @param topLeftCornerY {Integer} top left corner of rectangle y coordinate
				 @param color {String} Fill color or rectangle

				 @author Andrew Cohen
				 */
				function drawRect(topLeftCornerX, topLeftCornerY, color) {
					context.beginPath();
					context.rect(topLeftCornerX, topLeftCornerY, width, height);
					context.fillStyle = color;
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();
				}

				/*

				 Draws squares for movement

				 @author Andrew Cohen
				 */
				function drawGrid() {

					//left Side
					for( i = 0; i < 16; i++) {
						drawRect(topLeftCornerX, topLeftCornerY, "white");
						topLeftCornerY += width;
					}

					//move up one square
					topLeftCornerY -= height;

					//bottom
					for( i = 0; i < 16; i++) {
						drawRect(topLeftCornerX, topLeftCornerY, "white");
						topLeftCornerX += width;
					}

					//move left one
					topLeftCornerX -= width;

					//right (upwards)
					for( i = 0; i < 16; i++) {
						drawRect(topLeftCornerX, topLeftCornerY, "white");
						topLeftCornerY -= height;
					}

					//move down
					topLeftCornerY += height

					//top (leftward)
					for( i = 0; i < 15; i++) {
						drawRect(topLeftCornerX, topLeftCornerY, "white");
						topLeftCornerX -= width;
					}

				}

				/*
				 Draws booster/slider object

				 @param x {Integer} Start Coordinate X
				 @param y {Integer} Start coordinate Y
				 @param x2 {Integer} End Coordinate X
				 @param y2 {Integer} End Coordinate Y
				 @param color {String} Booster color

				 @author Andrew Cohen
				 */
				function drawBooster(x, y, x2, y2, color) {
					//line
					context.moveTo(x, y);
					//2nd block in
					context.lineTo(x2, y2);
					context.lineWidth = 2;
					context.stroke();

					//circle
					centerX = x2;
					centerY = y2;
					radius = (height / 2) - (height / 4);

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = color;
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

					//triangle
					padding = radius;
					context.moveTo(x - width / 4, y - padding);
					//start from top left
					context.lineTo(x, y);
					context.lineTo(x - width / 4, y + padding);
					context.lineTo(x - width / 4, y - padding);

					context.fillStyle = color;
					context.strokeStyle = "black";
					context.lineWidth = 2;

					context.fill();
					context.stroke();
					context.closePath();

				}

				/*
				 All boosters large and small
				 Draws 8 total (2 per color)

				 @author Andrew Cohen
				 */
				function drawAllBoosters() {
					//small booster values
					var x = (width) * 1.5;
					//start 1.5 squares in
					var y = (height) / 2;
					//start 0.5 squares down
					var x2 = (width) * 4.5;
					//end at 4.5 squares
					var y2 = y;

					//large boosters
					var x3 = width * 9.5;
					//start 9 squares in
					var x4 = x3 + (width * 4);
					//5 squares long
					var y3 = height / 2;
					var y4 = y3;

					//GREEN
					drawBooster(x, y, x2, y2, "green");
					//small

					drawBooster(x3, y3, x4, y4, "green");
					//large

					//red
					context.translate(canvas.width / 2, canvas.height / 2);
					//center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width / 2, -canvas.height / 2);
					//top-left

					drawBooster(x, y, x2, y2, "red");
					drawBooster(x3, y3, x4, y4, "red");
					//large

					//blue
					context.translate(canvas.width / 2, canvas.height / 2);
					//center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width / 2, -canvas.height / 2);
					//top-left

					drawBooster(x, y, x2, y2, "blue");
					drawBooster(x3, y3, x4, y4, "blue");
					//large

					//yellow
					context.translate(canvas.width / 2, canvas.height / 2);
					//center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width / 2, -canvas.height / 2);
					//top-left

					drawBooster(x, y, x2, y2, "yellow");
					drawBooster(x3, y3, x4, y4, "yellow");
					//large

					//normalize

					context.translate(canvas.width / 2, canvas.height / 2);
					//center
					context.rotate(Math.PI / 2);
					context.translate(-canvas.width / 2, -canvas.height / 2);
					//top-left
				}

				/*
				 Starting circles

				 @author Andrew Cohen
				 */
				function drawStart() {
					//green circle
					centerX = width * 4.5;
					centerY = height * 1.7;
					radius = (height / 1.5);

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "green";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

					//red circle
					centerX = width * 14.3;
					centerY = height * 4.5;
					radius = (height / 1.5);

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "red";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

					//blue circle
					centerX = width * 11.5;
					centerY = height * 14.3;
					radius = (height / 1.5);

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "blue";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

					//yellow circle
					centerX = width * 1.7;
					centerY = height * 11.5;
					radius = (height / 1.5);

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "yellow";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();
				}

				/*
				 Finish zones
				 1 per color, 4 total

				 @author Andrew Cohen
				 */
				function drawFinish() {
					//5sq 1c
					//Green
					x = width * 2;
					//top left
					y = height;

					for( i = 0; i < 5; i++) {
						drawRect(x, y, "green");
						y += height;
					}

					//green circle
					centerX = width * 2.5;
					centerY = height * 6.8;
					radius = (height );

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "green";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

					//red
					x = width * 14;
					//top left
					y = height * 2;

					for( i = 0; i < 5; i++) {
						drawRect(x, y, "red");
						x -= width;
					}

					//red circle
					centerX = width * 9.2;
					centerY = height * 2.5;
					radius = (height );

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "red";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

					//blue
					x = width * 13;
					//top left
					y = height * 14;

					for( i = 0; i < 5; i++) {
						drawRect(x, y, "blue");
						y -= height;
					}

					//blue circle
					centerX = width * 13.5;
					centerY = height * 9.2;
					radius = (height );

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "blue";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

					//yellow
					x = width * 1;
					//top left
					y = height * 13;

					for( i = 0; i < 5; i++) {
						drawRect(x, y, "yellow");
						x += width;
					}

					//yellow circle
					centerX = width * 6.8;
					centerY = height * 13.5;
					radius = (height );

					context.beginPath();
					context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
					context.fillStyle = "yellow";
					context.fill();
					context.lineWidth = 2;
					context.strokeStyle = "black";
					context.stroke();

				}

				/**
				 *
				 */
				function getClickCoordinates() {

					/*$("#myCanvas").bind("click", function(e) {

					 //determine position of canvas relative to the document
					 var offset = $(this).offset(),
					 //compensate event coordinates for offsets
					 x = e.pageX - offset.left,
					 y = e.pageY - offset.top;

					 var square = Sorry.Board.mapPixelsToSquare(x, y);
					 //check for collision
					 //if collision, bump pawn if its oppents
					 var adjustedSquare = Sorry.Board.adjustSquareForPawnColor(square,"yellow");
					 //set position of pawn
					 //setposition(adjustedSquare,Square);
					 //adjust occupied squares

					 console.log(square);
					 //console.log(adjustedSquare);
					 //console.log(x + "," + y);
					 });*/
				}

				return {
					drawBoard : function() {
						drawGrid();
						drawAllBoosters();
						drawStart();
						drawFinish();
					},
					eventLayer : function() {

						getClickCoordinates();

					}
				}

			})();
			/* (function() {

			Sorry.Board = (function() {

			return {
			/**
			*@param {Integer} x
			*@param {Integer} y
			*/
			/*mapPixelsToSquares : function(x, y) {

			var topRow = (x <= 640 && y <= 40),
			bottomRow = (x <= 640 && y >= 600),
			leftSide = (x <= 40 && y <= 600 && y >= 40),
			rightSide = (x >= 600 && y >= 40),
			square;

			console.log(greenSafety);

			if(topRow || bottomRow || leftSide || rightSide) {
			if(bottomRow) {
			x = 1280 - x; //+ Math.abs(640 - x);
			square = Math.ceil(x / 40) + 14;
			} else if(leftSide) {
			y = 1280 - y;
			square = 30 + Math.floor(y / 40);
			} else {
			square = Math.ceil(x / 40) + Math.floor(y / 40);
			}

			return square;
			}
			else {
			return;
			}
			},
			adjustSquareForPawnColor : function(square,color) {

			if(color === "green") {
			if(square < 4) {
			square += 56;
			}
			else {
			square -= 4;
			}
			}
			else if(color === "red") {
			if(square < 19) {
			square += 41;
			}
			else {
			square-=19;
			}
			}
			else if(color === "blue") {
			if(square < 34) {
			square+=26;
			}
			else {
			square-=34;
			}
			}
			else if(color === "yellow") {
			if(square < 49) {
			square += 11;
			}
			else {
			square-=49;
			}
			}

			square %= 60;

			return square;

			}
			}

			})();

			})();*/

			//console.log(Sorry);

			Sorry.gameBoard.drawBoard();

			Sorry.gameBoard.eventLayer();

		</script>
	</body>
</html>