<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Models\sparepart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\type;
use App\Models\Brand;
use App\Models\Category;
use App\Models\categoryPart;
use Illuminate\support\Facades\Storage;

class DashboardSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.stock.sparepart.index', [
            'title' => 'Sparepart',
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
        return view('dashboard.stock.sparepart.create', [
            'title' => 'Add Sparepart',
            'types' => type::all(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'catparts' => categoryPart::all(),
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
            'category_part_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:spareparts',
            'brand' => 'required',
            'codepart' => 'required',
            'pic' => 'image|file|max:2048',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request
                ->file('pic')
                ->store('sparepart-pic');
        }

        sparepart::create($validatedData);

        return redirect('/dashboard/stock/sparepart')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function show(sparepart $sparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(sparepart $sparepart)
    {
        return view('dashboard.stock.sparepart.edit', [
            'title' => 'Edit Sparepart',
            'data' => $sparepart,
            'catparts' => categoryPart::all(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sparepart $sparepart)
    {
        $rules = [
            'type_id' => 'required',
            'category_part_id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'codepart' => 'required',
            'pic' => 'image|file|max:2048',
        ];

        if ($request->slug != $sparepart->slug) {
            $rules['slug'] = 'required|unique:spareparts';
        }
        $validatedData = $request->validate($rules);

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request
                ->file('pic')
                ->store('sparepart-pic');
        }

        sparepart::where('id', $sparepart->id)->update($validatedData);

        return redirect('/dashboard/stock/sparepart')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(sparepart $sparepart)
    {
        sparepart::destroy($sparepart->id);
        if ($sparepart->pic) {
            storage::delete($sparepart->pic);
        }
        return redirect('/dashboard/stock/sparepart')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            sparepart::class,
            'slug',
            $request->name
        );
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

    public function detail(Type $type)
    {
        return view('dashboard.stock.sparepart.detail', [
            'title' => 'Sparepart ' . $type->name,
            'type' => $type,
            'datas' => sparepart::where('type_id', $type->id)
                ->latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function addsparepart(Type $type)
    {
        return view('dashboard.stock.sparepart.add', [
            'title' => 'Add sparepart Data' . $type->name,
            'type' => $type,
            'catparts' => categoryPart::all(),
        ]);
    }

    public function storepart(Request $request)
    {
        $validatedData = $request->validate([
            'type_id' => 'required',
            'category_part_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:spareparts',
            'brand' => 'required',
            'codepart' => 'required',
            'pic' => 'image|file|max:2048',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request
                ->file('pic')
                ->store('sparepart-pic');
        }

        sparepart::create($validatedData);

        return redirect(
            '/dashboard/stock/sparepart/detail/' . $request->type_slug
        )->with('success', 'New Unit Has Been aded.');
    }
}
