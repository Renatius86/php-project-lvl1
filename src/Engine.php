<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function result(mixed $answer, mixed $correctAnswer, string $name)
{
    if ($answer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        echo "'{$answer}' is wrong answer ;). Correct answer was '{$correctAnswer}'\n";
        line("Let's try again, %s!", $name);
        return false;
    }
}
