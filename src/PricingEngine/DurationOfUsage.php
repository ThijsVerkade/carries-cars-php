<?php

namespace CarriesCarsPhp\PricingEngine;

use CarriesCarsPhp\PricingEngine\ValueObject\Duration;

final class DurationOfUsage extends Duration
{
    public function __construct(int $length)
    {
        if($length < 1) {
            throw new \InvalidArgumentException('Sorry, DurationOfUsage should be at least one minute.');
        }
        parent::__construct($length);
    }
}
