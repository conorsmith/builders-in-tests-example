<?php
declare(strict_types=1);

namespace ConorSmith\BuildersInTestsExampleTest;

class TrackTest extends \PHPUnit_Framework_TestCase
{
    use BuildsAlbumValues;

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

    /**
     * @test
     */
    public function it_can_be_queried_for_its_artist()
    {
        $track = $this->track()
            ->withArtist($artist = $this->artist()->build())
            ->build();

        $this->assertTrue($artist->equals($track->getArtist()));
    }
}
