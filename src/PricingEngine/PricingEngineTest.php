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
    public function calculate_price_charged_per_minute(
        Money $pricePerMinute,
        DurationOfUsage $duration,
        Money $expectedPrice,
        DurationOfReservation $timeOfReaching,
        Mileage $mileage,
    ): void {
        $pricingEngine = new PricingEngine();
        $actual = $pricingEngine->calculatePrice(
            duration: $duration,
            pricePerMinute: $pricePerMinute,
            timeOfReaching: $timeOfReaching,
            mileage: $mileage,
        );
        $this->assertEquals($expectedPrice, $actual);
    }

    public static function provideDifferentDurationsAndPrices(): iterable
    {
        yield 'DurationOfUsage of 1 minute, time of reaching is 10 min and mileage of 5 with price of 0.30' => [
            Money::of(0.30, Currency::of('EUR')),
            DurationOfUsage::ofMinutes(1),
            Money::of(0.30, Currency::of('EUR')),
            DurationOfReservation::ofMinutes(10),
            Mileage::ofKilometers(5),
        ];
        yield 'DurationOfUsage of 3 minutes, time of reaching is 15 min and mileage of 5 with price of 0.30' => [
            Money::of(0.30, Currency::of('EUR')),
            DurationOfUsage::ofMinutes(3),
            Money::of(0.90, Currency::of('EUR')),
            DurationOfReservation::ofMinutes(15),
            Mileage::ofKilometers(5),
        ];
        yield 'DurationOfUsage of 12 minutes and time of reaching is 5 min and mileage of 5 with price of 0.23' => [
            Money::of(0.23, Currency::of('EUR')),
            DurationOfUsage::ofMinutes(12),
            Money::of(2.76, Currency::of('EUR')),
            DurationOfReservation::ofMinutes(5),
            Mileage::ofKilometers(5),
        ];
        yield 'DurationOfUsage of 12 minutes and time of reaching is 25 min and mileage of 5 with price of 0.23' => [
            Money::of(0.23, Currency::of('EUR')),
            DurationOfUsage::ofMinutes(12),
            Money::of(1.08, Currency::of('EUR')),
            DurationOfReservation::ofMinutes(25),
            Mileage::ofKilometers(5),
        ];
        yield 'DurationOfUsage of 12 minutes and time of reaching is 15 min and mileage of 250 with price of 0.23' => [
            Money::of(0.23, Currency::of('EUR')),
            DurationOfUsage::ofMinutes(12),
            Money::of(2.76, Currency::of('EUR')),
            DurationOfReservation::ofMinutes(15),
            Mileage::ofKilometers(250),
        ];
        yield 'DurationOfUsage of 12 minutes and time of reaching is 15 min and mileage of 300 with price of 0.23' => [
            Money::of(0.23, Currency::of('EUR')),
            DurationOfUsage::ofMinutes(12),
            Money::of(5.04, Currency::of('EUR')),
            DurationOfReservation::ofMinutes(15),
            Mileage::ofKilometers(300),
        ];
    }
}
