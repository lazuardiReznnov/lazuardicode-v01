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
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\stock\sparepartImport;

class DashboardSparepartController extends Controller
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
        return view('dashboard.stock.sparepart.show', [
            'title' => $sparepart->name,
            'data' => $sparepart->load('image'),
        ]);
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

        return redirect(
            '/dashboard/stock/sparepart/detail/' . $sparepart->type->slug
        )->with('success', 'New Unit Has Been aded.');
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
        return redirect(
            '/dashboard/stock/sparepart/detail/' . $sparepart->type->slug
        )->with('success', 'New Post Has Been Deleted.');
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
            'title' => $type->name,
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

    public function createexcl()
    {
        return view('dashboard.stock.sparepart.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new sparepartImport(), $validatedData['excl']);
            return redirect('/dashboard/stock/sparepart')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }

    public function createimage(sparepart $sparepart)
    {
        return view('dashboard.stock.sparepart.create-image', [
            'title' => 'File Upload',
            'data' => $sparepart,
        ]);
    }

    public function storeimage(Request $request)
    {
        $validatedData = $request->validate([
            'pic' => 'image|file|max:2048',
        ]);

        $validatedData['pic'] = $request->file('pic')->store('sparepart-pic');

        $sparepart = sparepart::find($request->sparepart_id);

        $sparepart->image()->create($validatedData);

        return redirect(
            '/dashboard/stock/sparepart/' . $request->sparepart_slug
        )->with('success', 'New Data Has Been Aded.!');
    }

    public function destroyimage(sparepart $sparepart, Request $request)
    {
        $data = $sparepart
            ->image()
            ->where('id', $request->id)
            ->first();

        storage::delete($data->pic);
        $data->delete();

        return redirect('/dashboard/stock/sparepart/' . $sparepart->slug)->with(
            'success',
            'Data Has Been Deleted.!'
        );
    }
}
