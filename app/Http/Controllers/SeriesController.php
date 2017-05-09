<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSeriesRequest;
use App\Series;

class SeriesController extends Controller
{
    public function edit(Series $series)
    {
        $series->load('parts');
        return view('series.edit', compact('series'));
    }

    public function update(UpdateSeriesRequest $request, Series $series)
    {
        $series->title = $request->title;
        $series->save();

        $series->parts->each(function ($part, $index) use ($request) {
            $part->timestamps = false;
            $part->update(array_only($request->parts[$index], ['title', 'sort_order']));
        });
    }
}
