<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\flag;
use Illuminate\Http\Request;
use App\Imports\Unit\flagsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardFlagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.unit.flag.index', [
            'title' => 'Flag Data ',
            'datas' => flag::latest()
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
        return view('dashboard.Unit.flag.create', [
            'title' => 'Create New Flag',
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
            'name' => 'required|max:100|unique:flags',
            'slug' => 'required|unique:flags',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|numeric|min:3',
            'address' => 'required',
            'pic' => 'image|file|max:2048',
        ]);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request->file('pic')->store('flag-pic');
        }

        flag::create($validatedData);

        return redirect('/dashboard/unit/flag')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function show(flag $flag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function edit(flag $flag)
    {
        return view('dashboard.unit.flag.edit', [
            'title' => 'Edit Unit Flag',
            'data' => $flag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, flag $flag)
    {
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|numeric|min:3',
            'address' => 'required',
            'pic' => 'image|file|max:2048',
        ];

        if ($request->name != $flag->name) {
            $rules['name'] = 'required|unique:flags|max:25';
        }
        if ($request->slug != $flag->slug) {
            $rules['slug'] = 'required|unique:flags';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request->file('pic')->store('flag-pic');
        }

        flag::where('id', $flag->id)->update($validatedData);

        return redirect('/dashboard/unit/flag')->with(
            'success',
            'New Post Has Been Updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function destroy(flag $flag)
    {
        flag::destroy($flag->id);
        if ($flag->pic) {
            storage::delete($flag->pic);
        }

        return redirect('/dashboard/unit/flag')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function createexcl()
    {
        return view('dashboard.Unit.flag.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new flagsImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/flag')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(flag::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
