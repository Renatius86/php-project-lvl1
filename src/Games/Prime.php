<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;

function prime()
{
    $name = welcome();
    $tryNumber = 3;
    $range = 20;
    $count = 0;
    $result = false;
    line("Answer \"yes\" if given number is prime, otherwise answer \"no\".");
    for ($i = 0; $i < $tryNumber; $i++) {
        $number = rand(1, $range);
        line('Question: %s', $number);
        $answer = prompt('Your Answer');
        $countPrime = 0;
        for ($j = 1; $j <= $number; $j++) {
            if ($number % $j === 0) {
                $countPrime++;
            }
        }
        if ($countPrime === 2) {
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
