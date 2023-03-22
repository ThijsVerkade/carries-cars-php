<?php

declare(strict_types=1);

namespace CarriesCarsPhp\PricingEngine;

use CarriesCarsPhp\PricingEngine\ValueObject\Distance;

class Usage
{
    public function __construct(
        public readonly RideDuration $rideDuration,
        public readonly DurationOfReservation $durationOfReservation,
        public readonly Mileage $mileage,
    )
    {
    }
}