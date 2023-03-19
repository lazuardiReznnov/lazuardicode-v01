<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Http\Controllers\Controller;
use App\Models\supplier;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\support\Facades\Storage;

class DashboardSupplierController extends Controller
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
        return view('dashboard.stock.supplier.index', [
            'title' => 'Supplier',
            'datas' => Supplier::latest()
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
        return view('dashboard.stock.supplier.create', [
            'title' => 'Add Supplier',
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
            'name' => 'required|max:20|unique:suppliers',
            'slug' => 'required|unique:suppliers',
            'tlp' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required',
            'pic' => 'image|file|max:2048',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request
                ->file('pic')
                ->store('supplier-pic');
        }

        supplier::create($validatedData);

        return redirect('/dashboard/stock/supplier')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        return view('dashboard.stock.supplier.show', [
            'title' => $supplier->name,
            'data' => $supplier->load('image'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        return view('dashboard.stock.supplier.edit', [
            'title' => 'Edit Supplier',
            'data' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        $rules = [
            'tlp' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required',
            'pic' => 'image|file|max:2048',
        ];

        if ($request->name != $supplier->name) {
            $rules['name'] = 'required|unique:suppliers|max:25';
        }
        if ($request->slug != $supplier->slug) {
            $rules['slug'] = 'required|unique:suppliers';
        }
        $validatedData = $request->validate($rules);

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request
                ->file('pic')
                ->store('supplier-pic');
        }

        supplier::where('id', $supplier->id)->update($validatedData);

        return redirect('/dashboard/stock/supplier')->with(
            'success',
            'Unit Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        supplier::destroy($supplier->id);
        if ($supplier->image) {
            storage::delete($supplier->image->pic);
            $supplier->image->delete();
        }
        return redirect('/dashboard/stock/supplier')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            supplier::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }

    public function createimage(supplier $supplier)
    {
        return view('dashboard.stock.supplier.create-image', [
            'title' => 'File Upload',
            'data' => $supplier,
        ]);
    }

    public function storeimage(Request $request)
    {
        $validatedData = $request->validate([
            'pic' => 'image|file|max:2048',
        ]);

        $validatedData['pic'] = $request->file('pic')->store('supplier-pic');

        $supplier = supplier::find($request->supplier_id);

        $supplier->image()->create($validatedData);

        return redirect(
            '/dashboard/stock/supplier/' . $request->supplier_slug
        )->with('success', 'New Data Has Been Aded.!');
    }

    public function destroyimage(supplier $supplier, Request $request)
    {
        $data = $supplier
            ->image()
            ->where('id', $request->id)
            ->first();

        storage::delete($data->pic);
        $data->delete();

        return redirect('/dashboard/stock/supplier/' . $supplier->slug)->with(
            'success',
            'Data Has Been Deleted.!'
        );
    }
}
