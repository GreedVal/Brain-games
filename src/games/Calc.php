<?php

namespace BrainGames\Games\Calc;

use BrainGames\Engine;

const OPERATORS = ['+', '-', '*'];
const DESCRIPTION = 'What is the result of the expression?';
const GAME_ROUNDS = 3;
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function getCalc(int $number1, int $number2, string $signs): int
{

    $result = 0;

    switch ($signs) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
        default:
            $result = 0;
            break;
    }

    return $result;
}

function getRandomSign(array $signs): string
{
    $randomSign = $signs[array_rand($signs)];
    return $randomSign;
}


function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < GAME_ROUNDS; $i++) {
        $randomNumber1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomNumber2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randomSign = getRandomSign(OPERATORS);

        $questionsAndAnswers[$i]['question'] = "{$randomNumber1} {$randomSign} {$randomNumber2}";
        $questionsAndAnswers[$i]['correct'] = getCalc($randomNumber1, $randomNumber2, $randomSign);
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
