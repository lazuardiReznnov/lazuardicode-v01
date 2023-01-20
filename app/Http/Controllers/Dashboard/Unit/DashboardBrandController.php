<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Imports\Unit\BrandsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Unit.brand.index', [
            'title' => 'Brand Unit Data',
            'datas' => Brand::latest()
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
        return view('dashboard.unit.brand.create', [
            'title' => 'Create New Brand',
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
            'name' => 'required|unique:brands',
            'slug' => 'required|unique:brands',
            'description' => 'required',
        ]);

        Brand::create($validatedData);

        return redirect('/dashboard/unit/brand')->with(
            'success',
            'New Post Has Been Created.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.Unit.brand.edit', [
            'title' => 'Edit Brand',
            'data' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'description' => 'required',
        ];

        if ($request->name != $brand->name) {
            $rules['name'] = 'required|unique:brands|max:25';
        }
        if ($request->slug != $brand->slug) {
            $rules['slug'] = 'required|unique:brands';
        }
        $validatedData = $request->validate($rules);

        Brand::Where('id', $brand->id)->update($validatedData);

        return redirect('/dashboard/unit/brand')->with(
            'success',
            'New Post Has Been Updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Brand::destroy($brand->id);

        return redirect('/dashboard/unit/brand')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Brand::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function createexcl()
    {
        return view('dashboard.Unit.brand.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new BrandsImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/brand')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }
}
