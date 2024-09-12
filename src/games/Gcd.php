<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Engine;

const DESCRIPTION_KEY = 'gcd';

function getGcdNumberAndResult(): array
{
    $randomNumber1 = Engine\getRandomNumber();
    $randomNumber2 = Engine\getRandomNumber();

    $result['question'] = "{$randomNumber1} {$randomNumber2}";

    while ($randomNumber2 != 0) {
        $data = $randomNumber2;
        $randomNumber2 = $randomNumber1 % $randomNumber2;
        $randomNumber1 = $data;
    }

    $result['correct'] = $randomNumber1;

    return $result;
}


function run(): void
{

    $gameRoundCount = Engine\getGameRounds();
    $questionsAndAnswers = [];

    for ($i = 0; $i < $gameRoundCount; $i++) {
        $questionsAndAnswers[] = getGcdNumberAndResult();
    }

    $gameRule = Engine\getDescription(DESCRIPTION_KEY);
    Engine\processGame($gameRule, $questionsAndAnswers);
}
