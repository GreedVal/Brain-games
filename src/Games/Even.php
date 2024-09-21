<?php

namespace Hexlet\Code\Games\Even;

use Hexlet\Code\Engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;
const GAME_ROUNDS = 3;


function isEven(int $number): string
{
    $result = $number % 2 === 0;
    return $result ? 'yes' : 'no';
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < GAME_ROUNDS; $i++) {
        $randomNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $questionsAndAnswers[$i]['question'] = $randomNumber;
        $questionsAndAnswers[$i]['correct'] = isEven($randomNumber);
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
