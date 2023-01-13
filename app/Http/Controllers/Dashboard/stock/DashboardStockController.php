<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\sparepart;
use App\Models\categoryPart;
use App\Models\invStock;
use App\Models\Stock;

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
            'title' => 'In Out Data Stock',
            'datas' => Supplier::latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function inv(Supplier $supplier)
    {
        $inv = invStock::Where('supplier_id', $supplier->id)
            ->paginate(10)
            ->withQueryString();
        // ->orderBy('tgl', 'desc')
        // ->paginate(10)
        // ->withQueryString();

        return view('dashboard.stock.inv', [
            'title' => 'Inv Data',
            'datas' => $inv,
            'name' => $supplier->name,
        ]);
    }

    public function detail(invStock $invStock)
    {
        return view('dashboard.stock.detail', [
            'title' => 'Detail Invoice',
            'datas' => stock::where('inv_stock_id', $invStock->id)
                ->paginate(10)
                ->withQueryString(),
            'link' => $invStock->supplier->slug,
            'name' => $invStock->name,
        ]);
    }
}
