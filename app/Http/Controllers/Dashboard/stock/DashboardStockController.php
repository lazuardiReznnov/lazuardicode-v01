<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Models\Stock;
use App\Models\invStock;
use App\Models\Supplier;
use App\Models\sparepart;
use Illuminate\Support\Str;
use App\Models\categoryPart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardStockController extends Controller
{
    public function index()
    {
        $categorypart = categoryPart::all();

        return view('dashboard.stock.index', [
            'title' => 'Stock Data',
            // 'datas' => categoryPart::latest()
            //     ->paginate(10)
            //     ->withQueryString(),
            'datas' => $categorypart->load('sparepart'),
        ]);
    }

    public function iodata()
    {
        $month = '';
        if (request('month')) {
            $month = request('month');
            $pisah = explode('-', $month);
            $data1 = invStock::whereMonth('tgl', '=', $pisah[1])
                ->whereYear('tgl', '=', $pisah[0])
                ->where('state', 'belum');

            $data2 = invStock::whereMonth('tgl', '=', $pisah[1])
                ->whereYear('tgl', '=', $pisah[0])
                ->where('state', 'lunas');
        } else {
            $data1 = invStock::whereMonth('tgl', '=', date('m'))->where(
                'state',
                'belum'
            );

            $data2 = invStock::whereMonth('tgl', '=', date('m'))->where(
                'state',
                'lunas'
            );
        }

        return view('dashboard.stock.iodata', [
            'title' => 'Billing List',
            'month' => $month,
            'datas1' => $data1->paginate(10)->withQueryString(),
            'datas2' => $data2->paginate(10)->withQueryString(),

            'datas3' => Supplier::all(),
        ]);
    }

    public function detail(invStock $invStock)
    {
        return view('dashboard.stock.detail', [
            'title' => 'Detail Invoice',
            'datas' => stock::where('inv_stock_id', $invStock->id)
                ->paginate(10)
                ->withQueryString(),
            'invStock' => $invStock,
        ]);
    }

    public function create(invStock $invStock)
    {
        return view('dashboard.stock.create', [
            'title' => 'add Sparepart',
            'sparepart' => sparepart::all(),
            'invStock' => $invStock,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        $str_rand = Str::random(3);

        $validatedData['inv_stock_id'] = $request->inv_stock_id;
        $validatedData['slug'] = Str::of($str_rand . ' ' . $request->tgl)->slug(
            '-'
        );

        Stock::create($validatedData);

        return redirect(
            '/dashboard/stock/detail/' . $request->inv_stock_slug
        )->with('success', 'New Post Has Been Added.');
    }

    public function edit(Stock $stock)
    {
        return view('dashboard.stock.edit', [
            'title' => 'edit Stock',
            'sparepart' => sparepart::all(),
            'data' => $stock,
        ]);
    }

    public function update(Request $request, Stock $stock)
    {
        $validatedData = $request->validate([
            'tgl' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        stock::where('id', $stock->id)->update($validatedData);
        return redirect(
            '/dashboard/stock/detail/' . $stock->invStock->slug
        )->with('success', 'New Post Has Been Updated.');
    }

    public function destroy(Stock $stock)
    {
        Stock::destroy($stock->id);

        return redirect(
            '/dashboard/stock/detail/' . $stock->invStock->slug
        )->with('success', 'New Post Has Been Deleted.');
    }

    public function pay(invStock $invStock)
    {
        invStock::where('id', $invStock->id)->update(['state' => 'lunas']);
        return redirect(
            '/dashboard/stock/iodata?month=' . request('month')
        )->with('success', 'New Post Has Been Paid');
    }
}
