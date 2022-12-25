<?php

namespace App\Http\Controllers\Landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Heropage;
use App\Models\About;
use App\Models\Portofolio;

class LandingpageController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'title' => 'Landingpage',
            'hero' => Heropage::get()->first(),
            'about' => About::get()->first(),
            'portos' => Portofolio::all(),
        ]);
    }
}
