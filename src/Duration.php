<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExample;

final class Duration
{
    public static function fromSeconds(int $seconds): Duration
    {
        return new self($seconds);
    }

    /** @var int */
    private $seconds;

    private function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }

    public function toSeconds(): int
    {
        return $this->seconds;
    }

    public function equals(Duration $other): bool
    {
        return $this->seconds === $other->seconds;
    }
}
