<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:view role', ['only' => ['index']]);
        $this->middleware('permission:create role', [
            'only' => ['create', 'store'],
        ]);
        $this->middleware('permission:edit role', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('dashboard.authentication.role.index', [
            'title' => 'Role Manegement',
            'datas' => Role::latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.authentication.role.create', [
            'title' => 'Add Role',
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
            'name' => 'required',
        ]);

        role::create($validatedData);
        return redirect('/dashboard/authentication/role')->with(
            'success',
            'New Data Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('dashboard.authentication.role.edit', [
            'data' => $role,
            'title' => 'Edit Role',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Role::Where('id', $role->id)->update($validatedData);

        return redirect('/dashboard/authentication/role')->with(
            'success',
            'New Data Has Been Updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::destroy($role->id);

        return redirect('/dashboard/authentication/role')->with(
            'success',
            'New Data Has Been Deleted.'
        );
    }
}
