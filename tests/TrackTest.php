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
        $track = Track::fromNameAndDuration("the track's name", Duration::fromSeconds(198));

        $this->assertSame("the track's name", $track->getName());
    }

    /**
     * @test
     */
    public function it_can_be_queried_for_its_duration()
    {
        $track = Track::fromNameAndDuration("the track's name", Duration::fromSeconds(198));

        $this->assertTrue(Duration::fromSeconds(198)->equals($track->getDuration()));
    }
}
