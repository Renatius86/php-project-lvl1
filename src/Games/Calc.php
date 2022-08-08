<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\result;

function calculation()
{
    $name = welcome();
    $tryNumber = 3;
    $range = 10;
    $count = 0;
    $operations = ['+', '-', '*'];
    line("What is the result of the expression?");
    for ($i = 0; $i < $tryNumber; $i++) {
        $isWrong = false;
        $numberOne = rand(0, $range);
        $numberTwo = rand(0, $range);
        $operation = array_rand($operations, 1);
        $calcOperation = $operations[$operation];
        $calcResult = 0;
        echo "Question: {$numberOne} {$calcOperation} {$numberTwo}\n";
        $answer = prompt('Your Answer');
        switch ($calcOperation) {
            case '+':
                $calcResult = $numberOne + $numberTwo;
                break;
            case '-':
                $calcResult = $numberOne - $numberTwo;
                break;
            case '*':
                $calcResult = $numberOne * $numberTwo;
                break;
        }
        $result = result((int)$answer, $calcResult, $name);
        if ($result) {
            $count++;
        } else {
            return;
        }
        if ($count === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
