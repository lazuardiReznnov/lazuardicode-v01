<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\group;
use Illuminate\Http\Request;
use App\Imports\Unit\groupsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.unit.group.index', [
            'title' => 'Group Unit Data',
            'datas' => group::latest()
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
        return view('dashboard.unit.group.create', [
            'title' => 'Create Group Unit',
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
            'name' => 'required|unique:groups',
            'slug' => 'required|unique:groups',
            'description' => 'required',
        ]);

        group::create($validatedData);

        return redirect('/dashboard/unit/group')->with(
            'success',
            'New Post Has Been Created.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        return view('dashboard.Unit.group.edit', [
            'title' => 'Edit Brand',
            'data' => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group $group)
    {
        $rules = [
            'description' => 'required',
        ];

        if ($request->name != $group->name) {
            $rules['name'] = 'required|unique:groups|max:25';
        }
        if ($request->slug != $group->slug) {
            $rules['slug'] = 'required|unique:groups';
        }
        $validatedData = $request->validate($rules);

        group::Where('id', $group->id)->update($validatedData);

        return redirect('/dashboard/unit/group')->with(
            'success',
            'New Post Has Been Updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        group::destroy($group->id);

        return redirect('/dashboard/unit/group')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(group::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function createexcl()
    {
        return view('dashboard.Unit.group.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new groupsImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/brand')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }
}
