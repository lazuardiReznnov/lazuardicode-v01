<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\support\Facades\Storage;
use App\Models\type;
use App\Models\Brand;
use App\Models\Carosery;
use App\Models\Category;
use App\Models\flag;
use App\Models\group;

class DashboardUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'data' => $unit,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
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
}
