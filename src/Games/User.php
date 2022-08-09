<?php

namespace BrainGames\User;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;

function evenOrNot()
{
    $name = welcome();
    $tryNumber = 3;
    $range = 10;
    $count = 0;
    $result = false;
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    for ($i = 0; $i < $tryNumber; $i++) {
        $isWrong = false;
        $number = rand(0, $range);
        line('Question: %s', $number);
        $answer = prompt('Your Answer');
        if ($number % 2 === 0) {
            $correctAnswer = 'yes';
            $result = result($answer, $correctAnswer, $name);
        } else {
            $correctAnswer = 'no';
            $result = result($answer, $correctAnswer, $name);
        }

        if ($result) {
            $count++;
        } else {
            return;
        }
        if ($count === 3) {
            line("Congratulations, %s!", $name);
            return;
        }
    }
}
