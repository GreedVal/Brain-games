<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 100;

function getEvenNumberAndResult(): array
{
    $randomNumber = rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
    $isRandomNumberEven = $randomNumber % 2 === 0;
    $correctAnswer = $isRandomNumberEven ? 'yes' : 'no';

    return [
        'Question' => $randomNumber,
        'Correct'  => $correctAnswer,
    ];
}

function run(): void
{
    $gameRoundCount = Engine\getGameRounds();
    $questionsAndAnswers = [];

    for ($i = 0; $i < $gameRoundCount; $i++) {
        $questionsAndAnswers[] = getEvenNumberAndResult();
    }

    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no".';
    Engine\processGame($gameRule, $questionsAndAnswers);
}