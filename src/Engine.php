<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greetUser;
use function cli\line;
use function cli\prompt;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;
const GAME_ROUNDS = 3;

function getGameRounds(): int
{
    return GAME_ROUNDS;
}

function getRandomNumber(): int
{
    return rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
}

function getRandomSign(array $signs): string
{
    $randomSign = $signs[array_rand($signs)];
    return $randomSign;
}

function getDescription(string $key = ''): string
{
    $description = '';

    switch ($key) {
        case 'even':
            $description = 'Answer "yes" if the number is even, otherwise answer "no".';
            break;
        case 'calc':
            $description = 'What is the result of the expression?';
            break;
        case 'gcd':
            $description = 'Find the greatest common divisor of given numbers.';
            break;
        case 'progression':
            $description = 'What number is missing in the progression?';
            break;
        case 'prime':
            $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
            break;
        default:
            $description = 'No description game';
            break;
    }

    return $description;
}

function processGame(string $gameRule, array $questionsAndAnswers): void
{
    $playerName = greetUser();
    line($gameRule);

    foreach ($questionsAndAnswers as $qa) {
        $question = $qa['question'];
        $correctAnswer = (string) $qa['correct'];

        line("Question: %s", $question);
        $answer = prompt("Your answer is ");

        if (mb_strtolower($answer) !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", ucfirst($playerName));
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", ucfirst($playerName));
}
