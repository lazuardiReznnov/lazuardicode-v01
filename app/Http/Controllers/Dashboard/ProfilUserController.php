<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ProfilUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:profil user', [
            'only' => ['index', 'update'],
        ]);
    }

    public function index()
    {
        return view('dashboard.user.profil.index', [
            'title' => 'Profil',
            'data' => Profil::where('user_id', Auth::user()->id)->first(),
        ]);
    }
}
