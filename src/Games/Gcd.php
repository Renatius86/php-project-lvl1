<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;

function gcd()
{
    $name = welcome();
    $tryNumber = 3;
    $range = 20;
    $count = 0;
    line("Find the greatest common divisor of given numbers.");
    for ($i = 0; $i < $tryNumber; $i++) {
        $isWrong = false;
        $correctAnswer = 0;
        $numberOne = rand(1, $range);
        $numberTwo = rand(1, $range);
        $min = min($numberOne, $numberTwo);
        $max = max($numberOne, $numberTwo);
        echo "Question: {$numberOne} {$numberTwo}\n";
        $answer = prompt('Your Answer');
        for ($j = $min; $j > 0; $j--) {
            if ($min % $j === 0 && $max % $j === 0) {
                $correctAnswer = $j;
                break;
            }
        }
        $result = result((int)$answer, $correctAnswer, $name);
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
