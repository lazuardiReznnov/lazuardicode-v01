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

    public function __construct()
    {
        $this->middleware('permission:view unit', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('permission:create unit', [
            'only' => ['create', 'store', 'createexl', 'storeexcel'],
        ]);
        $this->middleware('permission:edit unit', [
            'only' => ['edit', 'update'],
        ]);
        $this->middleware('permission:show unit', [
            'only' => ['show'],
        ]);
        $this->middleware('permission:delete unit', ['only' => ['destroy']]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|unique:flags',
            'slug' => 'required|unique:flags',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|numeric|min:3',
            'address' => 'required',
        ]);

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
        return view('dashboard.unit.flag.show', [
            'title' => $flag->name,
            'data' => $flag->load('image'),
        ]);
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
        ];

        if ($request->name != $flag->name) {
            $rules['name'] = 'required|unique:flags|max:25';
        }
        if ($request->slug != $flag->slug) {
            $rules['slug'] = 'required|unique:flags';
        }

        $validatedData = $request->validate($rules);

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
        if ($flag->image) {
            storage::delete($flag->image->pic);
            $flag->image->delete();
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

    public function createimage(flag $flag)
    {
        return view('dashboard.Unit.flag.create-image', [
            'title' => 'File Upload',
            'data' => $flag,
        ]);
    }

    public function storeimage(Request $request)
    {
        $validatedData = $request->validate([
            'pic' => 'image|file|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

        $validatedData['pic'] = $request->file('pic')->store('unit-pic');

        $flag = flag::find($request->flag_id);

        $flag->image()->create($validatedData);

        return redirect('/dashboard/unit/flag/' . $request->flag_slug)->with(
            'success',
            'New Data Has Been Aded.!'
        );
    }

    public function destroyimage(flag $flag, Request $request)
    {
        $data = $flag
            ->image()
            ->where('id', $request->id)
            ->first();

        storage::delete($data->pic);
        $data->delete();

        return redirect('/dashboard/unit/flag/' . $flag->slug)->with(
            'success',
            'Data Has Been Deleted.!'
        );
    }
}
