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
        $user = User::find(Auth::user()->id);

        return view('dashboard.user.profil.index', [
            'title' => 'Profil',
            'data' => Profil::where('user_id', Auth::user()->id)->first(),
            'user' => $user->load('image'),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'phone' => 'required',
            'address' => 'required',
            'job' => 'required',
            'word' => 'required',

            'twitter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
        ];
        $validatedData = $request->validate($rules);

        Profil::where('user_id', $user->id)->update($validatedData);
        return redirect('dashboard/user/profil')->with(
            'success',
            'Data Has Been Updated'
        );
    }

    public function createimage(Profil $profil)
    {
        return view('dashboard.user.profil.create-image', [
            'title' => 'File Upload',
            'data' => $profil,
        ]);
    }

    public function storeimage(Request $request)
    {
        $validatedData = $request->validate([
            'pic' => 'image|file|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

        $validatedData['pic'] = $request->file('pic')->store('user-pic');

        $profil = User::find($request->user_id);

        $profil->image()->create($validatedData);

        return redirect('/dashboard/user/profil/')->with(
            'success',
            'New Data Has Been Aded.!'
        );
    }

    public function destroyimage(Profil $profil, Request $request)
    {
        $data = $profil
            ->image()
            ->where('id', $request->id)
            ->first();

        storage::delete($data->pic);
        $data->delete();

        return redirect('/dashboard/unit/')->with(
            'success',
            'Data Has Been Deleted.!'
        );
    }
}
