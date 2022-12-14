<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
        return view('dashboard.authentication.permission.index', [
            'title' => 'Permission Management',
            'datas' => Permission::latest()
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
        return view('dashboard.authentication.permission.create', [
            'title' => 'Add New Permission',
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

        Permission::create($validatedData);
        return redirect('/dashboard/authentication/permission')->with(
            'success',
            'New Data Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('dashboard.authentication.permission.edit', [
            'title' => 'edit Permission',
            'data' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Permission::where('id', $permission->id)->update($validatedData);
        return redirect('/dashboard/authentication/permission')->with(
            'success',
            'New Data Has Been aded.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Permission::destroy($permission->id);

        return redirect('/dashboard/authentication/permission')->with(
            'success',
            'New Data Has Been Deleted.'
        );
    }
}
