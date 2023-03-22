<?php

declare(strict_types=1);

namespace CarriesCarsPhp\PricingEngine;

use CarriesCarsPhp\PricingEngine\ValueObject\Distance;

final class Mileage extends Distance
{
    public function isMaximumDistance(): bool
    {
        return $this->distance > Distance::ofKilometers(250)->distance;
    }
}