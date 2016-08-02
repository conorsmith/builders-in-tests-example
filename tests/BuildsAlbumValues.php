<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExampleTest;

use ConorSmith\BuildersInTestsExample\Duration;
use ConorSmith\BuildersInTestsExample\Track;

trait BuildsAlbumValues
{
    private function track()
    {
        return new class($this->duration()->build())
        {
            /** @var string */
            private $name;

            /** @var Duration */
            private $duration;

            public function __construct(Duration $defaultDuration)
            {
                $this->name = "some name";
                $this->duration = $defaultDuration;
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

            public function build(): Track
            {
                return Track::fromNameAndDuration($this->name, $this->duration);
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
}
