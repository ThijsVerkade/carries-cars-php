<?php

namespace CarriesCarsPhp\PricingEngine;

use Brick\Money\Currency;
use Brick\Money\Money;

class PricingEngine
{
    public function calculatePrice(
        DurationOfUsage $duration,
        Money $pricePerMinute,
        DurationOfReservation $timeOfReaching,
        Mileage $mileage
    ): Money {
        if ($timeOfReaching->isNotEnoughToReachVehicle()) {
            $pricePerMinute = Money::of(0.09, Currency::of('EUR'));
            // toevoegen over extra tijd
        }

        if ($mileage->isMaximumDistance()) {
            $additionalPrice = Money::of(0.19, Currency::of('EUR'));
            // toevoegen aan extra
            $pricePerMinute = Money::total($pricePerMinute, $additionalPrice);
        }

        return $pricePerMinute->multipliedBy($duration->length);
    }
}
