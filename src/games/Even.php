<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

const DESCRIPTION_KEY = 'even';

function getEvenNumberAndResult(): array
{
    $randomNumber = Engine\getRandomNumber();

    $isRandomNumberEven = $randomNumber % 2 === 0;
    $correctAnswer = $isRandomNumberEven ? 'yes' : 'no';

    return [
        'question' => $randomNumber,
        'correct'  => $correctAnswer,
    ];
}

function run(): void
{
    $gameRoundCount = Engine\getGameRounds();
    $questionsAndAnswers = [];

    for ($i = 0; $i < $gameRoundCount; $i++) 
    {
        $questionsAndAnswers[] = getEvenNumberAndResult();
    }

    $gameRule = Engine\getDescription(DESCRIPTION_KEY);
    Engine\processGame($gameRule, $questionsAndAnswers);
}