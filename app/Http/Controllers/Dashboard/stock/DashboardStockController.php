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
use Database\Seeders\InvStockSeeder;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Nette\Utils\Random;

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
        return view('dashboard.stock.iodata', [
            'title' => 'Invoicement',
            // 'datas' => invStock::whereMonth('tgl', '=', date('m'))
            //     ->paginate(10)
            //     ->withQueryString(),
            'datas' => Supplier::latest()
                ->paginate(10)
                ->withQueryString(),
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
}
