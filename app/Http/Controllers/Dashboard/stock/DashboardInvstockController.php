<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Models\invStock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardInvstockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Supplier $supplier)
    {
        $inv = invStock::Where('supplier_id', $supplier->id)
            ->paginate(10)
            ->withQueryString();
        // ->orderBy('tgl', 'desc')
        // ->paginate(10)
        // ->withQueryString();

        return view('dashboard.stock.inv.index', [
            'title' => 'Inv Data',
            'datas' => $inv,
            'name' => $supplier->name,
            'data' => $supplier->slug,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Supplier $supplier)
    {
        return view('dashboard.stock.inv.create', [
            'title' => 'Create New INV',
            'data' => $supplier,
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
            'tgl' => 'required',
            'name' => 'required|max:20|unique:inv_stocks',
            'slug' => 'required|unique:inv_stocks',
            'payment' => 'required',
            'pic' => 'image|file|max:2048',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request->file('pic')->store('inv-pic');
        }
        $validatedData['supplier_id'] = $request->supplier_id;

        invStock::create($validatedData);

        return redirect(
            "/dashboard/stock/invStock/$request->supplier_slug"
        )->with('success', 'New Unit Has Been aded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invStock  $invStock
     * @return \Illuminate\Http\Response
     */
    public function show(invStock $invStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invStock  $invStock
     * @return \Illuminate\Http\Response
     */
    public function edit(invStock $invStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invStock  $invStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invStock $invStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invStock  $invStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(invStock $invStock)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            InvStock::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }
}
