<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExample;

final class Track
{
    public static function fromNameAndDurationAndArtist(string $name, Duration $duration, Artist $artist): Track
    {
        return new self($name, $duration, $artist);
    }

    /** @var string */
    private $name;

    /** @var Duration */
    private $duration;

    /** @var Artist */
    private $artist;

    private function __construct(string $name, Duration $duration, Artist $artist)
    {
        $this->name = $name;
        $this->duration = $duration;
        $this->artist = $artist;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDuration(): Duration
    {
        return $this->duration;
    }

    public function getArtist(): Artist
    {
        return $this->artist;
    }
}
