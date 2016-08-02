<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExample;

final class Track
{
    public static function fromNameAndDuration(string $name, Duration $duration): Track
    {
        return new self($name, $duration);
    }

    /** @var string */
    private $name;

    /** @var Duration */
    private $duration;

    private function __construct(string $name, Duration $duration)
    {
        $this->name = $name;
        $this->duration = $duration;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDuration(): Duration
    {
        return $this->duration;
    }
}
