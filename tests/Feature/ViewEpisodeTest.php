<?php

namespace Tests\Feature;

use App\Episode;
use App\Serie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewEpisodeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_can_see_episode()
    {
        $serie = factory(Serie::class)->create();
        $episode = factory(Episode::class)->create([
            'name' => 'Acacha adminlte',
            'description' => 'Bla bla bla bla bla',
            'path' => 'storage/video1.mpg'
        ]);
        $serie->episodes()->save($episode);
        $response = $this->get('/series/' . $serie->id . '/episodes/' . $episode->id);
        $response->assertSuccessful();
        $response->assertViewIs('episodes.show');
//        $response->assertViewHas('episode',$episode);
        $response->assertViewHas('episode',function ($viewEpisode) use ($episode, $serie) {
            return $episode->id == $viewEpisode->id;
        });
        $response->assertViewHas('serie',function ($viewSerie) use ($episode, $serie) {
            return $viewSerie->id == $serie->id;
        });
        $response->assertSee($episode->name);
        $response->assertSee($episode->description);
        $this->assertTrue(true);
    }
}
