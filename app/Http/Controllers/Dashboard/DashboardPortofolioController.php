<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Portofolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\support\Facades\Storage;

class DashboardPortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:View Page', [
            'only' => ['index', 'show'],
        ]);
        $this->middleware('permission:Create Page', [
            'only' => ['create', 'store', 'addrole', 'storerole'],
        ]);
        $this->middleware('permission:Edit Page', [
            'only' => ['edit', 'update', 'updatepassword'],
        ]);
        $this->middleware('permission:Show Page', [
            'only' => ['show'],
        ]);
        $this->middleware('permission:Delete Page', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('dashboard.page.portofolio.index', [
            'title' => 'Portofolio Management',
            'datas' => Portofolio::latest()
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
        return view('dashboard.page.portofolio.create', [
            'title' => 'Create Portofolio',
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
            'name' => 'required|unique:portofolios',
            'slug' => 'required|unique:portofolios',
            'body' => 'required',
            'pic' => 'image|file|max:1024',
        ]);

        $validatedData['sbody'] = Str::limit(strip_tags($request->body), 200);

        if ($request->file('pic')) {
            $validatedData['pic'] = $request->file('pic')->store('page-pic');
        }

        Portofolio::create($validatedData);

        return redirect('dashboard/page/portofolio')->with(
            'success',
            'Data Has Been Updated'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        return view('dashboard.page.portofolio.show', [
            'title' => 'Detail Portofolio',
            'data' => $portofolio,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        Portofolio::destroy($portofolio->id);
        if ($portofolio->pic) {
            storage::delete($portofolio->pic);
        }
        return redirect('/dashboard/page/portofolio')->with(
            'success',
            'New File Has Been aded.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            Portofolio::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }
}
