<?php

namespace Hexlet\Code\Games\Progression;

use Hexlet\Code\Engine;

const LONG_PROGRESSION = 10;
const MIN_POSITION = 0;
const MAX_POSITION = 9;
const MIN_STEP = 2;
const MAX_STEP = 5;
const DESCRIPTION = 'What number is missing in the progression?';


function generateProgression(int $step, int $long, int $start): array
{
    $end = $start + $step * ($long - 1);
    return range($start, $end, $step);
}

function run(): void
{
    $questionsAndAnswers = [];

    for ($i = 1; $i <= Engine\GAME_ROUNDS; $i++) {
        $randomPosition = rand(MIN_POSITION, MAX_POSITION);
        $randomStep = rand(MIN_STEP, MAX_STEP);

        $progression = generateProgression($randomStep, LONG_PROGRESSION, $randomPosition);
        $correct = $progression[$randomPosition];

        $progression[$randomPosition] = '..';
        $question = implode(' ', $progression);

        $questionsAndAnswers[$i]['question'] = $question;
        $questionsAndAnswers[$i]['correct'] = (string) $correct;
    }

    Engine\processGame(DESCRIPTION, $questionsAndAnswers);
}
