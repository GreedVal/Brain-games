<?php

namespace BrainGames\Games\Calc;

use BrainGames\Engine;

const OPERATIN_SIGNS = ['+', '-', '*'];
const DESCRIPTION_KEY = 'calc';

function getCalcNumberAndResult(): array
{
    $randomNumber1 = Engine\getRandomNumber();
    $randomNumber2 = Engine\getRandomNumber();
    $randomSign = Engine\getRandomSing(OPERATIN_SIGNS);

    $result = [];

    $result['question'] = "{$randomNumber1} {$randomSign} {$randomNumber2}";

    switch ($randomSign) 
    {
        case '+':
            $result['correct'] = $randomNumber1 + $randomNumber2;
            break;
        case '-':
            $result['correct'] = $randomNumber1 - $randomNumber2;
            break;
        case '*':
            $result['correct'] = $randomNumber1 * $randomNumber2;
            break;
        default:

            break;
    }

    return $result;
}


function run(): void
{
    $gameRoundCount = Engine\getGameRounds();
    $questionsAndAnswers = [];

    for ($i = 0; $i < $gameRoundCount; $i++) 
    {
        $questionsAndAnswers[] = getCalcNumberAndResult();
    }

    $gameRule = Engine\getDescription(DESCRIPTION_KEY);
    Engine\processGame($gameRule, $questionsAndAnswers);
}