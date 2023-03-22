<?php

namespace CarriesCarsPhp\PricingEngine\ValueObject;

use CarriesCarsPhp\PricingEngine\DurationOfUsage;
use PHPUnit\Framework\TestCase;

class DurationTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideDifferentValidDurations
     */
    public function convert_from_and_to_text(int $duration): void
    {
        $duration = Duration::ofMinutes($duration);
        $this->assertEquals($duration, Duration::fromString($duration->toString()));
    }

    public static function provideDifferentValidDurations(): iterable
    {
        yield [1];
        yield [2];
        yield [100];
    }

}
