<?php

declare(strict_types=1);

namespace CarriesCarsPhp\PricingEngine;

use PHPUnit\Framework\TestCase;

final class MileageTest extends TestCase
{
    public function testIsMaximumDistance(): void
    {
        $mileage = Mileage::ofKilometers(300);
        self::assertTrue($mileage->isMaximumDistance());
    }

    public function testIsNotMaximumDistance(): void
    {
        $mileage = Mileage::ofKilometers(200);
        self::assertFalse($mileage->isMaximumDistance());
    }
}