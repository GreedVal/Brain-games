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
    $descriptions = [
        'even' => 'Answer "yes" if the number is even, otherwise answer "no".',
        'calc' => 'What is the result of the expression?',
        'gcd' => 'Find the greatest common divisor of given numbers.',
        'progression' => 'What number is missing in the progression?',
        'prime' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
    ];

    return $descriptions[$key] ?? 'No description game';
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
