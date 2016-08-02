<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExampleTest;

use ConorSmith\BuildersInTestsExample\Artist;
use ConorSmith\BuildersInTestsExample\Duration;
use ConorSmith\BuildersInTestsExample\Track;

trait BuildsAlbumValues
{
    private function track()
    {
        return new class($this->duration()->build(), $this->artist()->build())
        {
            /** @var string */
            private $name;

            /** @var Duration */
            private $duration;

            /** @var Artist */
            private $artist;

            public function __construct(Duration $defaultDuration, Artist $defaultArtist)
            {
                $this->name = "some name";
                $this->duration = $defaultDuration;
                $this->artist = $defaultArtist;
            }

            public function withName(string $name): self
            {
                $this->name = $name;
                return $this;
            }

            public function withDuration(Duration $duration): self
            {
                $this->duration = $duration;
                return $this;
            }

            public function withArtist(Artist $artist): self
            {
                $this->artist = $artist;
                return $this;
            }

            public function build(): Track
            {
                return Track::fromNameAndDurationAndArtist($this->name, $this->duration, $this->artist);
            }
        };
    }

    private function duration()
    {
        return new class()
        {
            /** @var int */
            private $seconds;

            public function __construct()
            {
                $this->seconds = 123;
            }

            public function withSeconds(int $seconds): self
            {
                $this->seconds = $seconds;
                return $this;
            }

            public function build(): Duration
            {
                return Duration::fromSeconds($this->seconds);
            }
        };
    }

    private function artist()
    {
        return new class()
        {
            /** @var string */
            private $name;

            public function __construct()
            {
                $this->name = "some name";
            }

            public function withName(string $name): self
            {
                $this->name = $name;
                return $this;
            }

            public function build(): Artist
            {
                return Artist::fromName($this->name);
            }
        };
    }
}
