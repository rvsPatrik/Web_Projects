let isMusicStarted = false;

function startBackgroundMusic() {
    if (!isMusicStarted) {
        const audio = document.getElementById('background-music');
        audio.play();
        audio.volume = 0.1;
        isMusicStarted = true;
    }
}

let playerScore = 0;
let computerScore = 0;

function computerChoice() {
    const choices = ['rock', 'paper', 'scissors'];
    const randomIndex = Math.floor(Math.random() * choices.length);
    return choices[randomIndex];
}

function play(userChoice) {
    const computer = computerChoice();
    const result = getResult(userChoice, computer);
    displayResult(result, computer);
    updateScore(result);
}

function getResult(user, computer) {
    if (user === computer) {
        return 'It\'s a tie!';
    } else if ((user === 'rock' && computer === 'scissors') ||
        (user === 'paper' && computer === 'rock') ||
        (user === 'scissors' && computer === 'paper')) {
        return 'You win!';
    } else {
        return 'You lose!';
    }
}

function displayResult(result, computerChoice) {
    const resultElement = document.getElementById('result');
    resultElement.innerHTML = `Computer chose ${computerChoice}. ${result}`;
}

function updateScore(result) {
    const playerScoreElement = document.getElementById('player-score');
    const computerScoreElement = document.getElementById('computer-score');
    if (result === 'You win!') {
        playerScore++;
    } else if (result === 'You lose!') {
        computerScore++;
    }
    playerScoreElement.textContent = playerScore;
    computerScoreElement.textContent = computerScore;
}

function resetScore() {
    playerScore = 0;
    computerScore = 0;
    const playerScoreElement = document.getElementById('player-score');
    const computerScoreElement = document.getElementById('computer-score');
    playerScoreElement.textContent = '0';
    computerScoreElement.textContent = '0';
}

document.getElementById('background-music').volume = 1;