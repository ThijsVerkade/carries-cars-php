<?php

declare(strict_types=1);

namespace CarriesCarsPhp\PricingEngine\ValueObject;

class Distance
{
    public function __construct(public readonly int $distance)
    {
    }

    public static function ofKilometers(int $kilometer): static
    {
        return new static($kilometer);
    }

    public static function fromString($string): static
    {
        return new static((int) $string);
    }

    public function toString(): string
    {
        return (string) $this->distance;
    }
}