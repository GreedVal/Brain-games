<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

const LONG_PROGRESSION = 10;
const MIN_POSITION = 1;
const MAX_POSITION = 10;
const MIN_STEP = 2;
const MAX_STEP = 5;
const GAME_ROUNDS = 3;
const DESCRIPTION = 'What number is missing in the progression?';


function isProgression(int $step, int $long, int $start): array
{
    $result = [];

    for ($i = 1; $i <= $long; $i++) {
        $number = $start + $step * $i;
        $result[$i] = $number;
    }

    return $result;
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < GAME_ROUNDS; $i++) {
        $randomPosition = rand(MIN_POSITION, MAX_POSITION);
        $randomStep = rand(MIN_STEP, MAX_STEP);

        $progression = isProgression($randomStep, LONG_PROGRESSION, $randomPosition);
        $correct = $progression[$randomPosition];

        $progression[$randomPosition] = '..';
        $question = implode(' ', $progression);

        $questionsAndAnswers[$i]['question'] = $question;
        $questionsAndAnswers[$i]['correct'] = $correct;
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
