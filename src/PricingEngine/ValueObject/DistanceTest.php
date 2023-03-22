<?php

namespace CarriesCarsPhp\PricingEngine\ValueObject;

use CarriesCarsPhp\PricingEngine\RideDuration;
use PHPUnit\Framework\TestCase;

class DistanceTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideDifferentValidDurations
     */
    public function convert_from_and_to_text(int $kilometers): void
    {
        $duration = Distance::ofKilometers($kilometers);
        $this->assertEquals($duration, Distance::fromString($duration->toString()));
    }

    public static function provideDifferentValidDurations(): iterable
    {
        yield [1];
        yield [2];
        yield [100];
    }
}
