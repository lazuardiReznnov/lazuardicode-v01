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
        //
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
        if ($supplier->pic) {
            storage::delete($supplier->pic);
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
}
