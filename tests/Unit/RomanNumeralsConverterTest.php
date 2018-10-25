<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\RomanNumeralsConverter;

class RomanNumeralsConverterTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->romanNumeralsConverter = new RomanNumeralsConverter();
    }

    /** @test */
    public function it_returns_I_for_1()
    {
        $this->assertEquals("I",$this->romanNumeralsConverter->convert(1));
    }

    /** @test */
    public function it_returns_II_for_2()
    {
        $this->assertEquals("II",$this->romanNumeralsConverter->convert(2));
    }

    /** @test */
    public function it_returns_IV_for_4()
    {
        $this->assertEquals("IV",$this->romanNumeralsConverter->convert(4));
    }

    /** @test */
    public function it_returns_V_for_5()
    {
        $this->assertEquals("V",$this->romanNumeralsConverter->convert(5));
    }

    /** @test */
    public function it_returns_IX_for_9()
    {
        $this->assertEquals("IX",$this->romanNumeralsConverter->convert(9));
    }

    /** @test */
    public function it_returns_X_for_10()
    {
        $this->assertEquals("X",$this->romanNumeralsConverter->convert(10));
    }

    /** @test */
    public function it_returns_XL_for_40()
    {
        $this->assertEquals("XL",$this->romanNumeralsConverter->convert(40));
    }

    /** @test */
    public function it_returns_L_for_50()
    {
        $this->assertEquals("L",$this->romanNumeralsConverter->convert(50));
    }

    /** @test */
    public function it_returns_XLIV_for_44()
    {
        $this->assertEquals("XLIV",$this->romanNumeralsConverter->convert(44));
    }
}
