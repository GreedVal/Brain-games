<?php

namespace Hexlet\Code\Games\Gcd;

use Hexlet\Code\Engine;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;


function findGcd(int $number1, int $number2): int
{
    while ($number2 !== 0) {
        $data = $number2;
        $number2 = $number1 % $number2;
        $number1 = $data;
    }

    return $number1;
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 1; $i <= Engine\GAME_ROUNDS; $i++) {
        $randomNumber1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNumber2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $questionsAndAnswers[$i]['question'] = "{$randomNumber1} {$randomNumber2}";
        $questionsAndAnswers[$i]['correct'] = findGcd($randomNumber1, $randomNumber2);
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
