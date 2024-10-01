<?php

namespace Hexlet\Code\Games\Even;

use Hexlet\Code\Engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;



function isEven(int $number): bool
{
    return $number % 2 === 0 ? true : false;
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 1; $i <= Engine\GAME_ROUNDS; $i++) {
        $randomNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);

        $correct = isEven($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswers[$i]['question'] = $randomNumber;
        $questionsAndAnswers[$i]['correct'] = $correct;
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
