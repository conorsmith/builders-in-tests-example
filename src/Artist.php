<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExample;

final class Artist
{
    public static function fromName(string $name): Artist
    {
        return new self($name);
    }

    /** @var string */
    private $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function equals(Artist $other): bool
    {
        return $this->name === $other->name;
    }
}
