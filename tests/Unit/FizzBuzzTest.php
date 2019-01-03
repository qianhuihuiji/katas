<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\FizzBuzz;

class FizzBuzzTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->fizzbuzz = new FizzBuzz();
    }

    /** @test */
    public function it_translate_1_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(1),1);
    }

    /** @test */
    public function it_translate_2_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(2),2);
    }

    /** @test */
    public function it_translate_3_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(3),'fizz');
    }

    /** @test */
    public function it_translate_5_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(5),'buzz');
    }

    /** @test */
    public function it_translate_6_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(6),'fizz');
    }

    /** @test */
    public function it_translate_10_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(10),'buzz');
    }

    /** @test */
    public function it_translate_15_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(15),'fizzbuzz');
    }

    /** @test */
    public function it_translate_123_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(123),'fizz');
    }

    /** @test */
    public function it_translate_150_for_fizzbuzz()
    {
        $this->assertEquals($this->fizzbuzz->execute(150),'fizzbuzz');
    }

    /** @test */
    public function it_translate_a_sequence_of_number_for_fizzbuzz()
    {
        $this->assertEquals(
            $this->fizzbuzz->executeUpTo(10),
            [1,2,'fizz',4,'buzz','fizz',7,8,'fizz','buzz']
        );
    }
}
