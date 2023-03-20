<?php

namespace CarriesCarsPhp\PricingEngine;

use Brick\Money\Currency;
use Brick\Money\Money;
use PHPUnit\Framework\TestCase;

class PricingEngineTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideDifferentDurationsAndPrices
     */
    public function calculate_price_charged_per_minute(Money $pricePerMinute, Duration $duration, Money $expectedPrice): void
    {
        $pricingEngine = new PricingEngine();
        $actual = $pricingEngine->calculatePrice(duration: $duration, pricePerMinute: $pricePerMinute);
        $this->assertEquals($expectedPrice, $actual);
    }

    public static function provideDifferentDurationsAndPrices(): iterable
    {
        yield 'Duration of 1 minute with price of 0.30' => [Money::of(0.30, Currency::of('EUR')), Duration::ofMinutes(1), Money::of(0.30, Currency::of('EUR'))];
        yield 'Duration of 3 minutes with price of 0.30' => [Money::of(0.30, Currency::of('EUR')), Duration::ofMinutes(3), Money::of(0.90, Currency::of('EUR'))];
        yield 'Duration of 12 minutes with price of 0.23' => [Money::of(0.23, Currency::of('EUR')), Duration::ofMinutes(12), Money::of(2.76, Currency::of('EUR'))];
    }
}
