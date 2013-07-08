var userScore = 0;
var compScore = 0;

function userRock(){
	document.getElementById('userResult').innerHTML="Player has picked rock.";
	comp = compTurn();
	document.getElementById('compResult').innerHTML= "The computer has chosen " + comp + ".";
	if (comp == "rock"){
		document.getElementById('results').innerHTML= "There is a tie!";
	} else if(comp == "paper"){
		compScore += 1;
		document.getElementById('results').innerHTML= "The computer has won this round!";
	} else {
		userScore += 1;
		document.getElementById('results').innerHTML= "You've won the round!";
	}
	document.getElementById('userPoints').innerHTML= userScore;
	document.getElementById('compPoints').innerHTML= compScore;
}

function userPaper(){
	document.getElementById('userResult').innerHTML="Player has picked paper.";
	comp = compTurn();
	document.getElementById('compResult').innerHTML= "The computer has chosen " + comp + ".";
	if (comp == "rock"){
		userScore += 1;
		document.getElementById('results').innerHTML= "You've won the round!";
	} else if(comp == "paper"){
		document.getElementById('results').innerHTML= "There is a tie!";
	} else {
		compScore += 1;
		document.getElementById('results').innerHTML= "The computer has won the round!";
	}
	document.getElementById('userPoints').innerHTML= userScore;
	document.getElementById('compPoints').innerHTML= compScore;
}

function userScissors(){
	document.getElementById('userResult').innerHTML="Player has picked scissors.";
	comp = compTurn();
	document.getElementById('compResult').innerHTML= "The computer has chosen " + comp + ".";
	if (comp == "rock"){
		compScore += 1;
		document.getElementById('results').innerHTML= "The computer has won the round!";
	} else if(comp == "paper"){
		userScore += 1;
		document.getElementById('results').innerHTML= "You've won this round!";
	} else {
		document.getElementById('results').innerHTML= "There is a tie!";
	}
	document.getElementById('userPoints').innerHTML= userScore;
	document.getElementById('compPoints').innerHTML= compScore;
}

function compTurn(){
	var compChoice = Math.floor(Math.random() * 3);
	if (compChoice == 0){
		return "rock";
	}  else if(compChoice == 1){
		return "paper";
	} else {
		return "scissors"
	}
}

function restartGame()
  {
  location.reload()
  }