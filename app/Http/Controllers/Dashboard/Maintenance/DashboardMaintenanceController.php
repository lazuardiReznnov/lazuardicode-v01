<?php

namespace App\Http\Controllers\Dashboard\Maintenance;

use App\Models\unit;
use App\Models\Maintenance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Msparepart;
use App\Models\sparepart;

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

    public function createpart(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.sparepart.create', [
            'title' => 'Add Sparepart',
            'data' => $maintenance,
            'spareparts' => sparepart::all(),
        ]);
    }

    public function storepart(Request $request)
    {
        $validatedData = $request->validate([
            'sparepart_id' => 'required',
            'qty' => 'required',
        ]);

        $str_rand = Str::random(3);
        $validatedData['slug'] = Str::of(
            $str_rand . ' ' . $request->regNum
        )->slug('-');

        $validatedData['maintenance_id'] = $request->maintenance_id;

        Msparepart::create($validatedData);

        return redirect(
            '/dashboard/maintenance/' . $request->maintenance_slug
        )->with('success', 'New Sparepart Has Been aded.');
    }

    public function deletepart(Maintenance $maintenance, Msparepart $msparepart)
    {
        Msparepart::destroy($msparepart->id);

        return redirect('/dashboard/maintenance/' . $maintenance->slug)->with(
            'success',
            'New Sparepart Has Been Deleted.'
        );
    }

    public function editpart(Maintenance $maintenance, Msparepart $msparepart)
    {
        return view('dashboard.maintenance.sparepart.edit', [
            'title' => 'Edit Sparepart Data',
            'maintenance' => $maintenance,
            'data' => $msparepart,
            'spareparts' => sparepart::all(),
        ]);
    }

    public function updatepart(Msparepart $msparepart, Request $request)
    {
        $validatedData = $request->validate([
            'sparepart_id' => 'required',
            'qty' => 'required',
        ]);

        $validatedData['maintenance_id'] = $request->maintenance_id;

        Msparepart::where('id', $msparepart->id)->update($validatedData);

        return redirect(
            '/dashboard/maintenance/' . $request->maintenance_slug
        )->with('success', 'New Sparepart Has Been Update.');
    }

    public function editstate(Maintenance $maintenance)
    {
        $state = ['start', 'checking', 'processing', 'finishing', 'completed'];
        return view('dashboard.maintenance.state', [
            'title' => 'Maintenance Update State',
            'data' => $maintenance,
            'states' => $state,
        ]);
    }

    public function updatestate(Request $request, Maintenance $maintenance)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        Maintenance::where('id', $maintenance->id)->update($validatedData);

        return redirect('/dashboard/maintenance/' . $maintenance->slug)->with(
            'success',
            'New Sparepart Has Been Update.'
        );
    }
}
