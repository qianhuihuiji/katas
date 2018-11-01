<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\StringCalculator;

class StringCalculatorTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->stringCalculator = new StringCalculator();
    }

    /** @test */
    public function it_translate_empty_string_into_zero()
    {
        $this->assertEquals(0,$this->stringCalculator->add(''));
    }

    /** @test */
    public function it_finds_the_sum_of_one_number()
    {
        $this->assertEquals(5,$this->stringCalculator->add('5'));
    }

    /** @test */
    public function it_finds_the_sum_of_two_numbers()
    {
        $this->assertEquals(3,$this->stringCalculator->add('1,2'));
    }

    /** @test */
    public function it_finds_the_sum_of_any_numbers()
    {
        $this->assertEquals(15,$this->stringCalculator->add('1,2,3,4,5'));
    }

    /** @test */
    public function it_disallows_negative_numbers()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('Invalid number privided:-3');

        $this->stringCalculator->add('1,2,-3,4,5');
    }

    /** @test */
    public function it_ignores_any_number_that_is_one_thousand_or_greater()
    {
        $this->assertEquals(3,$this->stringCalculator->add('1,2,1000'));
    }

    /** @test */
    public function it_allows_new_line_delimiters()
    {
        $this->assertEquals(6,$this->stringCalculator->add('1,2\n3'));
    }
}
