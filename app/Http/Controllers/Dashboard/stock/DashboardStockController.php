<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Models\Stock;
use App\Models\invStock;
use App\Models\Supplier;
use App\Models\sparepart;
use App\Models\categoryPart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Database\Seeders\InvStockSeeder;

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
            'datas2' => sparepart::all()->load('stock'),
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
