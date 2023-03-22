<?php

declare(strict_types=1);

namespace CarriesCarsPhp\PricingEngine;

use CarriesCarsPhp\PricingEngine\ValueObject\Duration;

final class DurationOfReservation extends Duration
{
    public function isNotEnoughToReachVehicle(): bool
    {
        return $this->length > 20;
    }
}