<?php

namespace Hexlet\Code\Games\Prime;

use Hexlet\Code\Engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateQuestionAndAnswer(): array
{
    $randomNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
    $correct = isPrime($randomNumber) ? 'yes' : 'no';

    return ['question' => $randomNumber, 'correct' => $correct];
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 1; $i <= Engine\GAME_ROUNDS; $i++) {
        $questionsAndAnswers[] = generateQuestionAndAnswer();
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
