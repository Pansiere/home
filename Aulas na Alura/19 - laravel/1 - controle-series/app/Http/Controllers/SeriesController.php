<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request): string
    {
        // dd($request);
        // dd($request->query());

        $series = [
            'Punisher',
            'Lost',
            'Grey\'s Anatomy'
        ];

        $html = '<ul>';
        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        $html .= '</ul>';

        return $html;
    }
}
