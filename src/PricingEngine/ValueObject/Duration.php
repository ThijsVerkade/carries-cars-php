<?php

declare(strict_types=1);

namespace CarriesCarsPhp\PricingEngine\ValueObject;

class Duration
{
    public function __construct(public readonly int $length)
    {
    }

    public static function ofMinutes(int $length): static
    {
        return new static($length);
    }

    public static function fromString($string): static
    {
        return new static((int) $string);
    }

    public function toString(): string
    {
        return (string) $this->length;
    }
}