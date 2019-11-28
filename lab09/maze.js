/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
"use strict";
var loser = null;  // whether the user has hit a wall

window.onload = function() {
	$("boundary1").onmouseover = overBoundary;
	var allWalls = $$(".boundary");
	for(var i=0;i<allWalls.length;i++){
		allWalls[i].onmouseover = overBoundary;
	}
	$("end").onmouseover = overEnd;
	$("start").onclick = startClick;
	$("maze").onmouseleave = overBody;
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
	var allWalls = $$(".boundary");
	for(var i=0;i<allWalls.length;i++){
		allWalls[i].addClassName("youlose");
	}
	var endMessage="You lose! :(";
	var h2=$("status");
	h2.innerHTML=endMessage;
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	var allWalls = $$(".boundary");
	for(var i=0;i<allWalls.length;i++){
		allWalls[i].removeClassName("youlose");
	}
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	var endMessage="You win! :)";
	var h2=$("status");
	h2.innerHTML=endMessage;
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	alert("NO");
}
