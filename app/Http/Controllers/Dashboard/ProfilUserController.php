<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\Storage;

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

    public function update(Request $request, User $user)
    {
        $rules = [
            'phone' => 'required',
            'address' => 'required',
            'job' => 'required',
            'word' => 'required',
            'pic' => 'image|file|max:1024',
            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
        ];
        $validatedData = $request->validate($rules);

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request->file('pic')->store('profile-pic');
        }

        Profil::where('user_id', $user->id)->update($validatedData);
        return redirect('dashboard/user/profil')->with(
            'success',
            'Data Has Been Updated'
        );
    }
}
