<?php
	include "includes/header.php";
	$status=0;
	$username="0";
	if(isset($_SESSION['username'])&& $_SESSION['username']!=""){
		$status=1;
		$username = $_SESSION['username'];
	}
?>
<style> 
body {
	 background: #82d2e5;
	 font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	 height: 100%;
	 color: #fff;
	 text-align: center;
}
 h1, h2 {
	 font-family: 'Roboto', sans-serif;
	 font-weight: 100;
	 font-size: 2.6em;
	 text-transform: uppercase;
}
 h3 {
	 font-family: 'Roboto', sans-serif;
	 font-weight: 100;
	 font-size: 1.4em;
	 text-transform: uppercase;
}
 #seconds, #tens {
	 font-size: 2em;
}
 button {
	 -moz-border-radius: 5px;
	 -webkit-border-radius: 5px;
	 border-radius: 5px;
	 -khtml-border-radius: 5px;
	 background: #82d2e5;
	 color: #fff;
	 border: solid 1px #fff;
	 text-decoration: none;
	 cursor: pointer;
	 font-size: 1.2em;
	 padding: 18px 10px;
	 width: 180px;
	 margin: 10px;
	 outline: none;
}
 button:hover {
	 -webkit-transition: all 0.5s ease-in-out;
	 -moz-transition: all 0.5s ease-in-out;
	 transition: all 0.5s ease-in-out;
	 background: #fff;
	 border: solid 1px #fff;
	 color: #82d2e5;
}
 #cards {
	 width: 360px;
	 margin: 10px auto;
}
 #cards:after {
	 content: "";
	 display: table;
	 clear: both;
}
 [data-view="card"] {
	 transform: rotateY(180deg);
	 width: 100px;
	 height: 140px;
	 border: solid 1px #d3cece;
	 border-radius: 5px;
	 float: left;
	 margin: 10px;
	 cursor: pointer;
	 background: linear-gradient(135deg, #f3f3f3 22px, #fff 22px, #fff 24px, transparent 24px, transparent 67px, #fff 67px, #fff 69px, transparent 69px), linear-gradient(225deg, #f3f3f3 22px, #fff 22px, #fff 24px, transparent 24px, transparent 67px, #fff 67px, #fff 69px, transparent 69px) 0 64px;
	 background-color: #f3f3f3;
	 background-size: 64px 128px;
}
 .flipped {
	 transition: 0.6s;
	 transform-style: preserve-3d;
	 position: relative;
	 transform: rotateY(0deg);
}
 .reverse {
	 transition: 0.6s;
	 transform-style: preserve-3d;
	 position: relative;
	 transform: rotateY(180deg);
}
 .correct {
	 opacity: 0.5;
	 cursor: default;
	 transform-style: preserve-3d;
	 position: relative;
	 transform: rotateY(0deg);
}
/* Icons */
 .correct[data-item="1"], .flipped[data-item="1"] {
	 background: url("./assets/game/1.png") left center no-repeat #fff;
	 background-size: contain;
}
 .correct[data-item="2"], .flipped[data-item="2"] {
	 background: url("./assets/game/2.png") left center no-repeat #fff;
	 background-size: contain;
}
 .correct[data-item="3"], .flipped[data-item="3"] {
	 background: url("./assets/game/3.png") left center no-repeat #fff;
	 background-size: contain;
}
 .correct[data-item="4"], .flipped[data-item="4"] {
	 background: url("./assets/game/4.png") left center no-repeat #fff;
	 background-size: contain;
}
 .correct[data-item="5"], .flipped[data-item="5"] {
	 background: url("./assets/game/5.png") left center no-repeat #fff;
	 background-size: contain;
}
.correct[data-item="6"], .flipped[data-item="6"] {
	 background: url("./assets/game/6.png") left center no-repeat #fff;
	 background-size: contain;
}
.correct[data-item="7"], .flipped[data-item="7"] {
	 background: url("./assets/game/7.png") left center no-repeat #fff;
	 background-size: contain;
}
.correct[data-item="8"], .flipped[data-item="8"] {
	 background: url("./assets/game/8.png") left center no-repeat #fff;
	 background-size: contain;
}
.correct[data-item="9"], .flipped[data-item="9"] {
	 background: url("./assets/game/9.png") left center no-repeat #fff;
	 background-size: contain;
}
.correct[data-item="10"], .flipped[data-item="10"] {
	 background: url("./assets/game/10.png") left center no-repeat #fff;
	 background-size: contain;
}
.result button{
	display: inline;
}
.result {
	display: none;
}
</style>
<main id="main">
    <button id="start-g" onclick = "start_game()">Start Game</button>
    <div id="game">
    <h1> pairs Game</h1>
	<p><span id="seconds">00</span>:<span id="tens">00</span></p>
	<p id = "text"></p>
        <div class="cards" id="cards"></div>
		<div class="result">
		<?php
			if($status==1){ ?>
			<button id="submit">Submit</button>	
		<?php } ?>
			<button onclick="again()">Play again</button>
		</div>
    </div>
</main>
<script src = "js/game.js"></script>
<?php
include "includes/footer.php";