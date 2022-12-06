<?php

namespace App\Http\Controllers\Landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function __invoke()
    {
        return view('layouts.frontend.landingpage', [
            'title' => 'Landingpage',
        ]);
    }
}
