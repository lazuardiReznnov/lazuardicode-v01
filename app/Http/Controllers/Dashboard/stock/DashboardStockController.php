<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\sparepart;
use App\Models\categoryPart;
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
            'datas' => Stock::select('inv')
                ->groupBy('inv')
                ->paginate(10)
                ->withQueryString(),
        ]);
    }
}
