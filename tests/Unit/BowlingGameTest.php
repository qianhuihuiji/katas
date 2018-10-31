<?php

namespace Tests\Unit;

use App\BowlingGame;
use Tests\TestCase;

class BowlingGameTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->bowlingGame = new BowlingGame();
    }

    /** @test */
    public function it_scores_a_gutter_game_as_zero()
    {
        $this->rollTimes(20,0);

        $this->assertEquals(0,$this->bowlingGame->score());
    }

    /** @test */
    public function it_scores_the_sum_0f_all_knocked_down_pins_for_a_game()
    {
        $this->rollTimes(20,1);

        $this->assertEquals(20,$this->bowlingGame->score());
    }

    /** @test */
    public function it_awards_a_roll_bonus_for_every_spare()
    {
        $this->rollSpare();

        $this->bowlingGame->roll(5);

        $this->rollTimes(17,0);

        $this->assertEquals(20,$this->bowlingGame->score());
    }

    /** @test */
    public function it_awards_a__two_roll_bonus_for_every_strike()
    {
        $this->bowlingGame->roll(10);

        $this->bowlingGame->roll(7);
        $this->bowlingGame->roll(2);

        $this->rollTimes(17,0);

        $this->assertEquals(28,$this->bowlingGame->score());
    }

    /** @test */
    public function it_scores_a_perfect_game()
    {
        $this->rollTimes(12,10);

        $this->assertEquals(300,$this->bowlingGame->score());
    }

    private function rollSpare()
    {
        $this->bowlingGame->roll(2);
        $this->bowlingGame->roll(8); 
    }

    private function rollTimes($times,$pints)
    {
        for($i=0;$i < $times;$i++)
        {
            $this->bowlingGame->roll($pints);
        }
    }
}
