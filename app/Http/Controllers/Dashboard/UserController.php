<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:view user', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('permission:create user', [
            'only' => ['create', 'store', 'addrole', 'storerole'],
        ]);
        $this->middleware('permission:edit user', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:show user', [
            'only' => ['show'],
        ]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('dashboard.user.index', [
            'datas' => User::latest()
                ->paginate(10)
                ->withQueryString(),
            'title' => 'User Management',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Create new user',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'string', 'max:255', 'Unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::Create($validatedData);
        $user->assignRole('user');

        return redirect('/dashboard/user')->with(
            'success',
            'New User Role Has Been Registered.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/user')->with(
            'success',
            'New User Role Has Been Deleted.'
        );
    }

    public function addrole(User $user)
    {
        return view('dashboard.user.addrole', [
            'title' => 'Add User Role',
            'data' => $user,
            'roles' => Role::latest()->get(),
        ]);
    }

    public function storerole(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role' => 'required',
        ]);

        $user->syncRoles($validatedData);

        return redirect('/dashboard/user')->with(
            'success',
            'New User Role Has Been Registered.'
        );
    }
}
