<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExampleTest;

use ConorSmith\BuildersInTestsExample\Duration;
use ConorSmith\BuildersInTestsExample\Track;

class TrackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_queried_for_its_name()
    {
        $track = $this->track()
            ->withName("the track's name")
            ->build();

        $this->assertSame("the track's name", $track->getName());
    }

    /**
     * @test
     */
    public function it_can_be_queried_for_its_duration()
    {
        $track = $this->track()
            ->withDuration($duration = $this->duration()->build())
            ->build();

        $this->assertTrue($duration->equals($track->getDuration()));
    }

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
