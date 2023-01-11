<?php

namespace App\Http\Controllers\Dashboard\stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\sparepart;
use App\Models\categoryPart;

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
}
