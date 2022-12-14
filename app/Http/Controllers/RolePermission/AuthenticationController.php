<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class AuthenticationController extends Controller
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
            'only' => ['regper', 'store'],
        ]);
        $this->middleware('permission:edit role', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('dashboard.authentication.index', [
            'datas' => Role::with('permissions')
                ->latest()
                ->paginate(10)
                ->withQueryString(),
            'title' => 'Authentication Management',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->validate([
            'permission' => 'required',
        ]);

        $role = Role::where('id', $request->role)->first();
        $role->syncPermissions($datas);
        return redirect('/dashboard/authentication')->with(
            'success',
            'New Data Has Been Registered.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::with('permissions')
            ->where('id', $id)
            ->first();

        foreach ($role->permissions as $permission):
            $role->revokePermissionTo($permission->name);
        endforeach;

        return redirect('/dashboard/authentication')->with(
            'success',
            'Data Has Been Unregistered.'
        );
    }

    public function regper($id)
    {
        return view('dashboard.authentication.create', [
            'title' => 'Add Role Permission',
            'role' => $id,
            'datas' => Permission::latest()->get(),
        ]);
    }
}
