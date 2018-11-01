<?php

namespace App;

use InvalidArgumentException;

class StringCalculator 
{
    const MAX_NUMBER_ALLOWED = 1000;

    public function add($numbers)
    {
        $numbers = $this->parseNumbers($numbers);

        $solution = 0;

        foreach($numbers as $number){
            $this->guardAgainstInvalidNumber($number);

            if($number >= self::MAX_NUMBER_ALLOWED) continue;

            $solution += $number;
        }

        return $solution;
    }

    private function guardAgainstInvalidNumber($number)
    {
        if($number < 0) throw new InvalidArgumentException("Invalid number privided:{$number}");
    }

    private function parseNumbers($numbers)
    {
        return array_map('intval',preg_split('/\s*(,|\\\n)\s*/',$numbers));
    }
}