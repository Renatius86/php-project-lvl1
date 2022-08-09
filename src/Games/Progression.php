<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;

function progression()
{
    $name = welcome();
    $tryNumber = 3;
    $range = 20;
    $count = 0;
    line("What number is missing in the progression?");
    for ($i = 0; $i < $tryNumber; $i++) {
        $isWrong = false;
        $correctAnswer = 0;

        $arr = [];
        $firstNumber = rand(0, $range);
        $offset = rand(1, 5);
        $arr[] = $firstNumber;

        for ($j = 0; $j < 10; $j++) {
            $numberChanged = $offset + $arr[$j];
            $arr[] = $numberChanged;
        }

        $str = '..';
        $hideNumber = rand(1, count($arr) - 1);
        $correctAnswer = $arr[$hideNumber];

        $arr[$hideNumber] = $str;
        $arrToString = implode(' ', $arr);

        echo "Question: {$arrToString}\n";
        $answer = prompt('Your Answer');
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
