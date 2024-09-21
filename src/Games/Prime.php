<?php

namespace Hexlet\Code\Games\Prime;

use Hexlet\Code\Engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const GAME_ROUNDS = 3;
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function isPrime(int $number): string
{
    if ($number < 2) {
        return 'no';
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }

    return 'yes';
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < GAME_ROUNDS; $i++) {
        $randomNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $questionsAndAnswers[$i]['question'] = $randomNumber;
        $questionsAndAnswers[$i]['correct'] = isPrime($randomNumber);
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
