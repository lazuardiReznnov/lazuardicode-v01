<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Models\invStock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\support\Facades\Storage;

class DashboardInvstockController extends Controller
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

    public function index(Supplier $supplier)
    {
        $month = '';
        if (request('month')) {
            $month = request('month');
            $pisah = explode('-', $month);
            $data = invStock::whereMonth('tgl', '=', $pisah[1])->whereYear(
                'tgl',
                '=',
                $pisah[0]
            );
        } else {
            $data = invStock::whereMonth('tgl', '=', date('m'));
        }

        return view('dashboard.stock.inv.index', [
            'title' => 'Inv Data',
            'datas' => $data
                ->Where('supplier_id', $supplier->id)
                ->paginate(10)
                ->withQueryString(),
            'name' => $supplier->name,
            'data' => $supplier->slug,
            'month' => $month,
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
        ]);

        if ($request->payment == 'credit') {
            $validatedData['state'] = 'belum';
        } elseif ($request->payment == 'cash') {
            $validatedData['state'] = 'lunas';
        } else {
            $validatedData['state'] = 'belum';
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
        $month = explode('-', $invStock->tgl);
        $data = \array_slice($month, 0, 2);
        $data1 = implode('-', $data);

        return view('dashboard.stock.inv.edit', [
            'title' => 'Edit Invoice',
            'data' => $invStock,
            'month' => $data1,
        ]);
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
        $rules = [
            'tgl' => 'required',
            'payment' => 'required',
            'pic' => 'image|file|max:2048',
        ];

        if ($request->name != $invStock->name) {
            $rules['name'] = 'required|unique:inv_stocks|max:25';
        }
        if ($request->slug != $invStock->slug) {
            $rules['slug'] = 'required|unique:inv_stocks';
        }
        $validatedData = $request->validate($rules);

        $validatedData['supplier_id'] = $invStock->supplier_id;

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request->file('pic')->store('inv-pic');
        }

        invStock::where('id', $invStock->id)->update($validatedData);

        return redirect(
            '/dashboard/stock/invStock/' .
                $invStock->supplier->slug .
                '?month=' .
                $request->month
        )->with('success', 'New Unit Has Been aded.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invStock  $invStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(invStock $invStock)
    {
        invStock::destroy($invStock->id);
        if ($invStock->image) {
            storage::delete($invStock->image->pic);
            $invStock->image->delete();
        }
        return redirect(
            '/dashboard/stock/invStock/' . $invStock->supplier->slug
        )->with('success', 'New Post Has Been Deleted.');
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

    public function createimage(invStock $invStock)
    {
        return view('dashboard.stock.inv.create-image', [
            'title' => 'File Upload',
            'data' => $invStock,
        ]);
    }

    public function storeimage(Request $request)
    {
        $validatedData = $request->validate([
            'pic' => 'image|file|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

        $validatedData['pic'] = $request->file('pic')->store('invStock-pic');

        $invStock = invStock::find($request->inv_stock_id);

        $invStock->image()->create($validatedData);

        return redirect(
            '/dashboard/stock/detail/' . $request->inv_stock_slug
        )->with('success', 'New Data Has Been Aded.!');
    }

    public function destroyimage(invStock $invStock, Request $request)
    {
        $data = $invStock
            ->image()
            ->where('id', $request->id)
            ->first();

        storage::delete($data->pic);
        $data->delete();

        return redirect('/dashboard/stock/detail/' . $invStock->slug)->with(
            'success',
            'Data Has Been Deleted.!'
        );
    }
}
