<?php

declare(strict_types=1);

namespace CarriesCarsPhp\PricingEngine;

use Brick\Money\Money;

class RentalAgreement
{
    public function __construct(
        public readonly Money $pricePerMinute,
    )
    {
    }
}