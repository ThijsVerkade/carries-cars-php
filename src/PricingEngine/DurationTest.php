<?php

namespace CarriesCarsPhp\PricingEngine;

use PHPUnit\Framework\TestCase;

class DurationTest extends TestCase
{
    /** @test */
    public function duration_should_be_at_least_one_minute(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Duration::ofMinutes(0);
    }
}
