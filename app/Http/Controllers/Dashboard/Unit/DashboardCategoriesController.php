<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Unit\CategoriesImport;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:view unit', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('permission:create unit', [
            'only' => ['create', 'store', 'createexl', 'storeexcel'],
        ]);
        $this->middleware('permission:edit unit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:show unit', [
            'only' => ['show'],
        ]);
        $this->middleware('permission:delete unit', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('dashboard.Unit.category.index', [
            'title' => 'Categories Unit',
            'datas' => Category::latest()
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
        return view('dashboard.Unit.category.create', [
            'title' => 'create New Category',
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

        Category::create($validatedData);

        return redirect('/dashboard/unit/category')->with(
            'success',
            'New Post Has Been Created.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.unit.category.edit', [
            'title' => 'Edit Category',
            'data' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'description' => 'required',
        ];

        if ($request->name != $category->name) {
            $rules['name'] = 'required|unique:categories|max:25';
        }
        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }
        $validatedData = $request->validate($rules);

        Category::Where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/unit/category')->with(
            'success',
            'New Post Has Been Updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/unit/category')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            Category::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }

    public function createexcl()
    {
        return view('dashboard.Unit.category.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new CategoriesImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/category')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }
}
