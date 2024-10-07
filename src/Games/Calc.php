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
            //todo добавить оброботку exeption при вызове метода
            throw new Exception('Invalid operator');
    }
}

function getRandomSign(array $signs): string
{
    return $signs[array_rand($signs)];
}

function generateQuestionAndAnswer(): array
{
    $randomNumber1 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
    $randomNumber2 = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
    $randomSign = getRandomSign(OPERATORS);

    $correct = (string) calculate($randomNumber1, $randomNumber2, $randomSign);
    $question = "{$randomNumber1} {$randomSign} {$randomNumber2}";
    $result = ['question' => $question, 'correct' => $correct];

    return $result;
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 1; $i <= Engine\GAME_ROUNDS; $i++) {
        $questionsAndAnswers[] = generateQuestionAndAnswer();
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
