<?php

namespace App\Http\Controllers\Dashboard\Track;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardTrackController extends Controller
{
    public function index()
    {
        $date_now = date('Y/m/d');
        return view('dashboard.track.index', [
            'title' => 'Track Management',
            'date' => $date_now,
        ]);
    }
}
