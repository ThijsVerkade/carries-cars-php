<?php

namespace CarriesCarsPhp\PricingEngine;

use Brick\Money\Money;

class PricingEngine
{
    public function calculatePrice(Duration $duration, Money $pricePerMinute): Money
    {
        return $pricePerMinute->multipliedBy($duration->length);
    }
}
