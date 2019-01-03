<?php

namespace App;

class TennisMatch
{
    protected $player1;
    protected $player2;

    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner()) {
            return 'Win For ' . $this->leader()->name;
        }

        if ($this->hasTheAdvantage()) {
            return 'Advantage ' . $this->leader()->name;
        }

        if($this->inDeuce())
        {
            return 'Deuce';
        }

        return $this->generalScore(); ;
    }

    private function generalScore()
    {
        $score = $this->lookup[$this->player1->points] . '-';

        return $score .=  $this->tied() ? 'All' : $this->lookup[$this->player2->points];
    }

    private function tied()
    {
        return $this->player1->points == $this->player2->points;
    }

    private function hasAWinner()
    {
        return  $this->hasEnoughPointsToBeWon() && $this->isLeadingAtLeastByTwo();
    }

    private function hasTheAdvantage()
    {
        return  $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    private function inDeuce()
    {
        return $this->player1->points + $this->player2->points >= 6 && $this->tied();
    }

    private function hasEnoughPointsToBeWon()
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    private function isLeadingAtLeastByTwo()
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }

    private function isLeadingByOne()
    {
        return abs($this->player1->points - $this->player2->points) == 1;
    }

    private function leader()
    {
        return $this->player1->points > $this->player2->points ? $this->player1 : $this->player2;
    }
}
