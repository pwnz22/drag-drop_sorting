<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSeriesRequest;
use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function edit(Series $series)
    {
        $series->load('parts');
        return view('series.edit', compact('series'));
    }

    public function update(UpdateSeriesRequest $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'parts.*.title' => 'required'
        ], [
            'title.required' => 'You must enter series title!'
        ]);


    }
}
