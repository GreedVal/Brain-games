<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

const MAX_LONG_PROGRESSION = 9;
const MIN_LONG_PROGRESSION = 1;
const MIN_STEP_PROGRESSION = 2;
const MAX_STEP_PROGRESSION = 9;
const DESCRIPTION_KEY = 'progression';


function getProgressionNumberAndResult(): array
{

    $randomNumberStart = Engine\getRandomNumber();

    $randomPosition = rand(MIN_LONG_PROGRESSION, MAX_LONG_PROGRESSION);
    $randomStep = rand(MIN_STEP_PROGRESSION, MAX_STEP_PROGRESSION);

    $result = [];
    $progression = [];
    $correctAnswer = $randomNumberStart;

    for ($i = 1; $i <= MAX_LONG_PROGRESSION; $i++) {
        $number = $randomNumberStart + $randomStep * $i;

        $progression[] = $number;

        if ($randomPosition == $i) {
            $correctAnswer = $number;
        }
    }

    $progression[$randomPosition] = '..';

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
