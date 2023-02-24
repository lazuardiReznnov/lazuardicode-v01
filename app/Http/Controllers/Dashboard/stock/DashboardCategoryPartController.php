<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Models\categoryPart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\stock\categoryPartImport;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:view stock', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('permission:create stock', [
            'only' => ['create', 'store', 'createexl', 'storeexcel'],
        ]);
        $this->middleware('permission:edit stock', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:show stock', [
            'only' => ['show'],
        ]);
        $this->middleware('permission:delete stock', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('dashboard.stock.sparepart.category-sparepart.index', [
            'title' => 'Category Sparepart Data',
            'datas' => categoryPart::latest()
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
        return view('dashboard.stock.sparepart.category-sparepart.create', [
            'title' => 'Create New Category Sparepart',
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
            'descriptions' => 'required',
        ]);

        categoryPart::create($validatedData);

        return redirect('/dashboard/stock/sparepart/categoryPart')->with(
            'success',
            'New Post Has Been Created.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoryPart  $categoryPart
     * @return \Illuminate\Http\Response
     */
    public function show(categoryPart $categoryPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoryPart  $categoryPart
     * @return \Illuminate\Http\Response
     */
    public function edit(categoryPart $categoryPart)
    {
        return view('dashboard.stock.sparepart.category-sparepart.edit', [
            'title' => 'Edit Category Sparepart',
            'data' => $categoryPart,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoryPart  $categoryPart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoryPart $categoryPart)
    {
        $rules = [
            'descriptions' => 'required',
        ];

        if ($request->name != $categoryPart->name) {
            $rules['name'] = 'required|unique:category_parts|max:25';
        }
        if ($request->slug != $categoryPart->slug) {
            $rules['slug'] = 'required|unique:category_parts';
        }
        $validatedData = $request->validate($rules);

        categoryPart::Where('id', $categoryPart->id)->update($validatedData);

        return redirect('/dashboard/stock/sparepart/categoryPart')->with(
            'success',
            'New Post Has Been Updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoryPart  $categoryPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoryPart $categoryPart)
    {
        categoryPart::destroy($categoryPart->id);

        return redirect('/dashboard/stock/sparepart/categoryPart/')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            categoryPart::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }

    public function createexcl()
    {
        return view(
            'dashboard.stock.sparepart.category-sparepart.create-excel',
            [
                'title' => 'File Import Via Excel',
            ]
        );
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new categoryPartImport(), $validatedData['excl']);
            return redirect('/dashboard/stock/sparepart/categoryPart')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }
}
