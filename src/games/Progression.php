<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

const LONG_PROGRESSION = 15;
const MIN_LONG_PROGRESSION = 1;
const STEP_PROGRESSION = 2;
const DESCRIPTION_KEY = 'progression';


function getProgressionNumberAndResult(): array
{

    $randomNumber1 = Engine\getRandomNumber();

    $randomPosition = rand(MIN_LONG_PROGRESSION, LONG_PROGRESSION);

    $progression[] = $randomNumber1;

    for ($i = 1; $i < LONG_PROGRESSION; $i++) {
        $number = $progression[$i - 1] + STEP_PROGRESSION;

        $progression[$i] = $number;

        if ($randomPosition == $i) {
            $result['correct'] = $number;
        }
    }

    $progression[$randomPosition] = '..';

    $progressionString = implode(' ', $progression);

    $result['question'] = $progressionString;

    return  $result;
}



function run(): void
{

    $gameRoundCount = Engine\getGameRounds();
    $questionsAndAnswers = [];

    for ($i = 0; $i < $gameRoundCount; $i++) {
        $questionsAndAnswers[] = getProgressionNumberAndResult();
    }

    $gameRule = Engine\getDescription(DESCRIPTION_KEY);
    Engine\processGame($gameRule, $questionsAndAnswers);
}
