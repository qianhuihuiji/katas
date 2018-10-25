<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\PrimeFactors;

class PrimeFactorsTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->primeFactors = new PrimeFactors();
    }

    /** @test */
    public function it_returns_an_empty_array_for_1()
    {
        $this->assertEmpty($this->primeFactors->generate(1));
    }

    /** @test */
    public function it_returns_2_for_2()
    {
        $this->assertEquals([2],$this->primeFactors->generate(2));
    }

    /** @test */
    public function it_returns_3_for_3()
    {
        $this->assertEquals([3],$this->primeFactors->generate(3));
    }

    /** @test */
    public function it_returns_2_2_for_4()
    {
        $this->assertEquals([2,2],$this->primeFactors->generate(4));
    }

    /** @test */
    public function it_returns_5_for_5()
    {
        $this->assertEquals([5],$this->primeFactors->generate(5));
    }

    /** @test */
    public function it_returns_2_3_for_6()
    {
        $this->assertEquals([2,3],$this->primeFactors->generate(6));
    }

    /** @test */
    public function it_returns_2_2_2_for_8()
    {
        $this->assertEquals([2,2,2],$this->primeFactors->generate(8));
    }

    /** @test */
    public function it_returns_3_3_for_9()
    {
        $this->assertEquals([3,3],$this->primeFactors->generate(9));
    }

    /** @test */
    public function it_returns_2_5_for_10()
    {
        $this->assertEquals([2,5],$this->primeFactors->generate(10));
    }


    /** @test */
    public function it_returns_5_5_for_25()
    {
        $this->assertEquals([5,5],$this->primeFactors->generate(25));
    }

    /** @test */
    public function it_returns_2_2_5_5_for_100()
    {
        $this->assertEquals([2,2,5,5],$this->primeFactors->generate(100));
    }
}
