<?php

namespace App\Http\Controllers\Dashboard\Maintenance;

use App\Models\unit;
use App\Models\Maintenance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Msparepart;

class DashboardMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.maintenance.index', [
            'title' => 'Maintenance Management',
            'datas' => Maintenance::whereMonth('tgl', '=', date('m'))
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
        return view('dashboard.maintenance.create', [
            'title' => 'Form Maintenance Data',
            'units' => unit::all(),
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
            'unit_id' => 'required',
            'name' => 'required',
            'tgl' => 'required',
            'finish' => 'required',
            'description' => 'required',
            'instruction' => 'required',
        ]);
        $str_rand = Str::random(5);
        $validatedData['slug'] = Str::of(
            $str_rand . ' ' . $request->unit_id
        )->slug('-');

        Maintenance::create($validatedData);

        return redirect('/dashboard/maintenance')->with(
            'success',
            'New Post Has Been Aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.show', [
            'title' => 'Detail Maintenance data',
            'data' => $maintenance,
            'mparts' => Msparepart::where('maintenance_id', $maintenance->id)
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.edit', [
            'title' => 'Edit Maintenance Data',
            'data' => $maintenance,
            'units' => unit::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $validatedData = $request->validate([
            'unit_id' => 'required',
            'name' => 'required',
            'tgl' => 'required',
            'finish' => 'required',
            'description' => 'required',
            'instruction' => 'required',
        ]);

        Maintenance::where('id', $maintenance->id)->update($validatedData);

        return redirect('/dashboard/maintenance')->with(
            'success',
            'New Post Has Been updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        Maintenance::destroy($maintenance->id);

        return redirect('/dashboard/maintenance')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function printspk(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.print', [
            'title' => 'Print Out SPK',
            'data' => $maintenance,
        ]);
    }
}
