<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\type;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\Unit\typesImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.unit.type.index', [
            'title' => 'Type Unit Data',
            'datas' => type::latest()
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
        return view('dashboard.unit.type.create', [
            'title' => 'Create Type Unit',
            'categories' => Category::All(),
            'brands' => Brand::All(),
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
            'brand_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|unique:types|max:100',
            'slug' => 'required|unique:types',
            'description' => 'required',
        ]);

        type::create($validatedData);

        return redirect('/dashboard/unit/type')->with(
            'success',
            'New Post Has Been Added.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(type $type)
    {
        return view('dashboard.unit.type.edit', [
            'title' => 'Edit Type Unit',
            'data' => $type,
            'categories' => Category::All(),
            'brands' => Brand::All(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, type $type)
    {
        $rules = [
            'brand_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ];

        if ($request->name != $type->name) {
            $rules['name'] = 'required|unique:types|max:25';
        }
        if ($request->slug != $type->slug) {
            $rules['slug'] = 'required|unique:types';
        }
        $validatedData = $request->validate($rules);

        type::where('id', $type->id)->update($validatedData);

        return redirect('/dashboard/unit/type')->with(
            'success',
            'Unit Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(type $type)
    {
        type::destroy($type->id);

        return redirect('/dashboard/unit/type')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(type::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function createexcl()
    {
        return view('dashboard.Unit.type.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new typesImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/type')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }
}
