<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\DbTestCase;
use Laracasts\TestDummy\Factory;

class ExampleTest extends DbTestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');

        DB::beginTransaction();
    }

    public function tearDown()
    {
        DB::rollback();
    }

    /**
     * @test
     */
    function it_gets_the_total_length_of_all_songs_in_album()
    {
        // given
        $artist = Factory::create(Artist::class);
        $album = Factory::create(Album::class, ['artist_id' => $artist->id]);
        Factory::times(3)->create(Song::class, ['album_id' => $album->id, 'length' => 200]);

        // when
        $album = Album::first();
        $length = $album->getTotalLength();

        // then
        $this->assertEquals(600, $length);
    }
}
