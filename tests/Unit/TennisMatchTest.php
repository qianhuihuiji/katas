<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\TennisMatch;
use App\Player;

class TennisMatchTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->john = new Player('John',0);
        $this->jane = new Player('Jane',0);
        $this->tennisMatch = new TennisMatch($this->john,$this->jane);
    }

    /** @test */
    public function it_scores_a_scoreless_game()
    {
        $this->assertEquals($this->tennisMatch->score(),'Love-All');
    }

    /** @test */
    public function it_scores_a_1_0_game()
    {
        $this->john->earnPoints(1);

        $this->assertEquals($this->tennisMatch->score(),'Fifteen-Love');
    }

    /** @test */
    public function it_scores_a_2_0_game()
    {
        $this->john->earnPoints(2);

        $this->assertEquals($this->tennisMatch->score(),'Thirty-Love');
    }

    /** @test */
    public function it_scores_a_3_0_game()
    {
        $this->john->earnPoints(3);

        $this->assertEquals($this->tennisMatch->score(),'Forty-Love');
    }

    /** @test */
    public function it_scores_a_4_0_game()
    {
        $this->john->earnPoints(4);

        $this->assertEquals($this->tennisMatch->score(),'Win For John');
    }

    /** @test */
    public function it_scores_a_0_4_game()
    {
        $this->jane->earnPoints(4);

        $this->assertEquals($this->tennisMatch->score(),'Win For Jane');
    }

    /** @test */
    public function it_scores_a_4_3_game()
    {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);

        $this->assertEquals($this->tennisMatch->score(),'Advantage John');
    }

    /** @test */
    public function it_scores_a_3_3_game()
    {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(3);

        $this->assertEquals($this->tennisMatch->score(),'Deuce');
    }
}
