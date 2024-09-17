<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

const LONG_PROGRESSION = 10;
const MIN_LONG_PROGRESSION = 1;
const MIN_STEP_PROGRESSION = 2;
const MAX_STEP_PROGRESSION = 9;
const DESCRIPTION_KEY = 'progression';


function getProgressionNumberAndResult(): array
{

    $randomNumber1 = Engine\getRandomNumber();

    $randomPosition = rand(MIN_LONG_PROGRESSION, LONG_PROGRESSION);
    $randomStep = rand(MIN_STEP_PROGRESSION, MAX_STEP_PROGRESSION);

    $result = [];
    $progression = [];
    $progression[] = $randomNumber1;
    $correctAnswer = 0;

    for ($i = 1; $i <= LONG_PROGRESSION; $i++) {
        $number = $progression[$i - 1] + $randomStep;

        $progression[$i] = $number;

        if ($randomPosition == $i) {
            $correctAnswer = $number;
        }
    }

    if ($randomPosition < LONG_PROGRESSION) {
        $progression[$randomPosition] = '..';
    }

    $progressionString = implode(' ', $progression);

    $result['question'] = $progressionString;
    $result['correct'] = $correctAnswer;

    return $result;
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
