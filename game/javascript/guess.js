function playGame(){
	var compNumber = Math.floor(Math.random() * 100 + 1);
	var gameStatus = true;
	var numberOfTries = 3;
	
	guessTheNumber(compNumber);
	
	function guessTheNumber(cNum){
		while(gameStatus){
			for ( var i = 3; i > 0; i--){
				var userGuess = prompt("Guess a number between 1 and 100");
				if (cNum < userGuess){
					document.getElementById('result').innerHTML = "Lower";
				} else if (cNum > userGuess){
					document.getElementById('result').innerHTML = "Higher";
				} else {
					document.getElementById('result').innerHTML = "Congratulation, you've guess the correct number!";
					i = 0;
					gameStatus = false;
				}
			}
			document.getElementById('result').innerHTML = "You lost! The number was " + cNum + ".";
			gameStatus = false;
		}
	}
}