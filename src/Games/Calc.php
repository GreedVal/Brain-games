<?php

namespace Hexlet\Code\Games\Calc;

use Exception;
use Hexlet\Code\Engine;

const OPERATORS = ['+', '-', '*'];
const DESCRIPTION = 'What is the result of the expression?';
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function calculate(int $number1, int $number2, string $signs): int
{
    switch ($signs) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
        default:
            throw new Exception('Invalid operator');
    }
}

function getRandomSign(array $signs): string
{
    return $signs[array_rand($signs)];
}


function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 1; $i <= Engine\GAME_ROUNDS; $i++) {
        $randomNumber1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNumber2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomSign = getRandomSign(OPERATORS);

        $questionsAndAnswers[$i]['question'] = "{$randomNumber1} {$randomSign} {$randomNumber2}";
        $questionsAndAnswers[$i]['correct'] = (string) calculate($randomNumber1, $randomNumber2, $randomSign);
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
