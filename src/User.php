<?php

namespace BrainGames\User;

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $tryNumber = 3;
    $range = 100;
    $count = 0;
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    for ($i = 0; $i < $tryNumber; $i++) {
        $isWrong = false;
        $number = rand(0, $range);
        line('Question: %s', $number);
        $answer = prompt('Your Answer');
        if ($number % 2 === 0) {
            switch ($answer) {
                case 'yes':
                    line('Correct!');
                    $count++;
                    break;
                default:
                    echo "{$answer} is wrong answer ;). Correct answer was 'yes'\n";
                    line("Let's try again, %s", $name);
                    $isWrong = true;
                    break;
            }
        } else {
            switch ($answer) {
                case 'no':
                    line('Correct!');
                    $count++;
                    break;
                default:
                    echo "{$answer} is wrong answer ;). Correct answer was 'no'\n";
                    line("Let's try again, %s", $name);
                    $isWrong = true;
                    break;
            }
        }
        if ($isWrong) {
            return;
        }
        if ($count === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
