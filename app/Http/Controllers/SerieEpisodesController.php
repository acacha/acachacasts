<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Serie;
use Illuminate\Http\Request;

/**
 * Class SerieEpisodesController.
 *
 * @package App\Http\Controllers
 */
class SerieEpisodesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie, Episode $episode)
    {
        return view ('episodes.show', [
            'serie' => $serie,
            'episode' => $episode
        ]);
    }


}
