<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\Carosery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Unit\caroseriesImport;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCaroseriesController extends Controller
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
        return view('dashboard.Unit.carosery.index', [
            'title' => 'Carosery Unit',
            'datas' => Carosery::latest()
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
        return view('dashboard.Unit.carosery.create', [
            'title' => 'Create Carosery Data',
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

        Carosery::create($validatedData);

        return redirect('/dashboard/unit/carosery')->with(
            'success',
            'New Post Has Been Created.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($carosery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carosery $carosery)
    {
        return view('dashboard.unit.carosery.edit', [
            'title' => 'Edit Caroser Data',
            'data' => $carosery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carosery $carosery)
    {
        $rules = [
            'description' => 'required',
        ];

        if ($request->name != $carosery->name) {
            $rules['name'] = 'required|unique:caroseries|max:25';
        }
        if ($request->slug != $carosery->slug) {
            $rules['slug'] = 'required|unique:caroseries';
        }
        $validatedData = $request->validate($rules);

        Carosery::Where('id', $carosery->id)->update($validatedData);

        return redirect('/dashboard/unit/carosery')->with(
            'success',
            'New Post Has Been Updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carosery $carosery)
    {
        Carosery::destroy($carosery->id);

        return redirect('/dashboard/unit/carosery')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            Carosery::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }

    public function createexcl()
    {
        return view('dashboard.unit.carosery.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new caroseriesImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/carosery')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }
}
