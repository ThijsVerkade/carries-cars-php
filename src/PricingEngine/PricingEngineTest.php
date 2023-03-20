<?php

namespace CarriesCarsPhp\PricingEngine;

use Brick\Money\Currency;
use Brick\Money\Money;
use PHPUnit\Framework\TestCase;

class PricingEngineTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideDurations
     */
    public function calculate_price_charged_per_minute(Money $pricePerMinute, Duration $duration, Money $expectedPrice): void
    {
        $pricingEngine = new PricingEngine();
        $actual = $pricingEngine->calculatePrice(duration: $duration, pricePerMinute: $pricePerMinute);
        $this->assertEquals($expectedPrice, $actual);
    }

    public static function provideDurations(): iterable
    {
        yield [Money::of(0.30, Currency::of('EUR')), Duration::ofMinutes(1), Money::of(0.30, Currency::of('EUR'))];
        yield [Money::of(0.30, Currency::of('EUR')), Duration::ofMinutes(3), Money::of(0.90, Currency::of('EUR'))];
        yield [Money::of(0.23, Currency::of('EUR')), Duration::ofMinutes(12), Money::of(2.76, Currency::of('EUR'))];
    }
}
