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
        RentalAgreement $rentalAgreement,
        Usage $usage,
        Money $expectedPrice,
    ): void {
        $pricingEngine = new PricingEngine();
        $actual = $pricingEngine->calculatePrice(
            rentalAgreement: $rentalAgreement,
            usage: $usage,
        );
        $this->assertEquals($expectedPrice, $actual);
    }

    public static function provideDifferentDurationsAndPrices(): iterable
    {
        yield 'RideDuration of 1 minute, time of reaching is 10 min and mileage of 5 with price of 0.30' => [
            new RentalAgreement(Money::of(0.30, Currency::of('EUR'))),
            new Usage(RideDuration::ofMinutes(1), DurationOfReservation::ofMinutes(10), Mileage::ofKilometers(5)),
            Money::of(0.30, Currency::of('EUR')),
        ];
        yield 'RideDuration of 3 minutes, time of reaching is 15 min and mileage of 5 with price of 0.30' => [
            new RentalAgreement(Money::of(0.30, Currency::of('EUR'))),
            new Usage(RideDuration::ofMinutes(3), DurationOfReservation::ofMinutes(15), Mileage::ofKilometers(5)),
            Money::of(0.90, Currency::of('EUR')),
        ];
        yield 'RideDuration of 12 minutes and time of reaching is 5 min and mileage of 5 with price of 0.23' => [
            new RentalAgreement(Money::of(0.23, Currency::of('EUR'))),
            new Usage(RideDuration::ofMinutes(12), DurationOfReservation::ofMinutes(5), Mileage::ofKilometers(5)),
            Money::of(2.76, Currency::of('EUR')),
        ];
//        yield 'RideDuration of 12 minutes and time of reaching is 25 min and mileage of 5 with price of 0.23' => [
//            new RentalAgreement(Money::of(0.23, Currency::of('EUR'))),
//            new Usage(RideDuration::ofMinutes(12), DurationOfReservation::ofMinutes(25), Mileage::ofKilometers(5)),
//            Money::of(1.08, Currency::of('EUR')),
//        ];
//        yield 'RideDuration of 12 minutes and time of reaching is 15 min and mileage of 250 with price of 0.23' => [
//            new RentalAgreement(Money::of(0.23, Currency::of('EUR'))),
//            RideDuration::ofMinutes(12),
//            Money::of(2.76, Currency::of('EUR')),
//            DurationOfReservation::ofMinutes(15),
//            Mileage::ofKilometers(250),
//        ];
//        yield 'RideDuration of 12 minutes and time of reaching is 15 min and mileage of 300 with price of 0.23' => [
//            new RentalAgreement(Money::of(0.23, Currency::of('EUR'))),
//            RideDuration::ofMinutes(12),
//            Money::of(5.04, Currency::of('EUR')),
//            DurationOfReservation::ofMinutes(15),
//            Mileage::ofKilometers(300),
//        ];
    }
}
