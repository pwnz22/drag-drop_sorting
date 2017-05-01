<?php

namespace App\Http\Controllers;

use App\Series;

class SeriesController extends Controller
{
    public function edit(Series $series)
    {
        $series->load('parts');
        return view('series.edit', compact('series'));
    }

    public function update()
    {
        
    }
}
