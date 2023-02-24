<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\flag;
use App\Models\type;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\group;
use App\Models\Carosery;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\Unit\unitsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardUnitController extends Controller
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
        return view('dashboard.Unit.index', [
            'title' => 'Unit Management',
            'datas' => Unit::latest()
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
        return view('dashboard.unit.create', [
            'title' => 'Create New Unit',
            'types' => type::all(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'groups' => Group::all(),
            'flags' => flag::all(),
            'caroseries' => Carosery::all(),
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
            'type_id' => 'required',
            'carosery_id' => 'required',
            'flag_id' => 'required',
            'group_id' => 'required',
            'name' => 'required|max:20|unique:units',
            'slug' => 'required|unique:units',
            'color' => 'required',
            'vin' => 'required',
            'engine_numb' => 'required',
            'fuel' => 'required',
            'year' => 'required',
            'pic' => 'image|file|max:2048',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request->file('pic')->store('unit-pic');
        }

        Unit::create($validatedData);

        return redirect('/dashboard/unit')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('dashboard.unit.show', [
            'title' => 'Detail Unit',
            'data' => $unit->load('letter'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('dashboard.unit.edit', [
            'title' => 'Edit Unit',
            'unit' => $unit,
            'types' => type::all(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'groups' => Group::all(),
            'flags' => flag::all(),
            'caroseries' => Carosery::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $rules = [
            'type_id' => 'required',
            'carosery_id' => 'required',
            'flag_id' => 'required',
            'group_id' => 'required',

            'color' => 'required',
            'vin' => 'required',
            'engine_numb' => 'required',
            'fuel' => 'required',
            'year' => 'required',
            'pic' => 'image|file|max:2048',
        ];

        if ($request->name != $unit->name) {
            $rules['name'] = 'required|unique:units|max:25';
        }
        if ($request->slug != $unit->slug) {
            $rules['slug'] = 'required|unique:units';
        }
        $validatedData = $request->validate($rules);

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request->file('pic')->store('unit-pic');
        }

        Unit::where('id', $unit->id)->update($validatedData);

        return redirect('/dashboard/unit')->with(
            'success',
            'Unit Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        Unit::destroy($unit->id);
        if ($unit->pic) {
            storage::delete($unit->pic);
        }
        return redirect('/dashboard/unit')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Unit::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function getType(Request $request)
    {
        $type = Type::where([
            ['brand_id', $request->brand],
            ['category_id', $request->category],
        ])->get();
        return response()->json($type);
    }

    public function createexcl()
    {
        return view('dashboard.Unit.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new unitsImport(), $validatedData['excl']);
            return redirect('/dashboard/unit')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }
}
