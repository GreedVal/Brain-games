<?php

namespace BrainGames\Games\Prime;

use BrainGames\Engine;

const DESCRIPTION_KEY = 'prime';


function getPrimeNumberAndResult(): array
{
    $randomNumber1 = Engine\getRandomNumber();

    $result = [];
    $result['question'] = $randomNumber1;

    if ($randomNumber1 < 2) {
        $result['correct'] = 'no';
    } else {
        $result['correct'] = primeNumber($randomNumber1);
    }

    return $result;
}

function primeNumber(int $number): string
{
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return 'no';
        }
    }

    return 'yes';
}


function run(): void
{
    $gameRoundCount = Engine\getGameRounds();
    $questionsAndAnswers = [];

    for ($i = 0; $i < $gameRoundCount; $i++) {
        $questionsAndAnswers[] = getPrimeNumberAndResult();
    }

    $gameRule = Engine\getDescription(DESCRIPTION_KEY);
    Engine\processGame($gameRule, $questionsAndAnswers);
}
