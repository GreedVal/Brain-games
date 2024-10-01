<?php

namespace Hexlet\Code\Engine;

use function Hexlet\Code\Cli\greetUser;
use function cli\line;
use function cli\prompt;

//todo создать config файл для настроек игр, кол-во раундов, сложность
const GAME_ROUNDS = 3;

function processGame(string $gameRule, array $questionsAndAnswers): void
{
    $playerName = greetUser();
    line($gameRule);

    foreach ($questionsAndAnswers as $qa) {
        $question = $qa['question'];
        $correctAnswer = $qa['correct'];

        line("Question: %s", $question);
        $answer = prompt("Your answer is ");

        if (mb_strtolower($answer) !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", ucfirst($playerName));
            return;
        }

        line("Correct!");
    }
    line("Congratulations, %s!", ucfirst($playerName));
}
