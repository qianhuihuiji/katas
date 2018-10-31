<?php

namespace App;

class BowlingGame
{
    protected $rolls = [];

    public function roll($pints)
    {
       $this->rolls[] += $pints; 
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        for($frame = 1;$frame <= 10;$frame++)
        {
            if($this->isStrike($roll)){
                $score += 10 + $this->getStrikeBonus($roll);

                $roll += 1;
            }elseif($this->isSpare($roll)){
                $score += 10 + $this->getSpareBonus($roll);

                $roll += 2;
            }else{
                $score += $this->getDefaultFrameScore($roll);

                $roll += 2;
            }
        }

        return $score;
    }

    private function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll+1] == 10;
    }

    private function isStrike($roll)
    {
       return $this->rolls[$roll] == 10;
    }

    private function getDefaultFrameScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll+1];
    }

    private function getStrikeBonus($roll)
    {
        return $this->rolls[$roll+1] + $this->rolls[$roll+2];
    }

    private function getSpareBonus($roll)
    {
        return $this->rolls[$roll+2];
    }
}
