<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeasonsController extends Controller
{
    public function index(Series $series)
    {
        // $seasons = $series->seasons;
        $seasons = $series->seasons()->with('episodes')->get();

        return  view('seasons.index')->with('seasons', $seasons)->with('series', $series);
    }
}
