<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Portofolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('dashboard.page.portofolio.edit', [
            'title' => 'Edit Portofolio',
            'data' => $portofolio,
        ]);
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
        //
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
