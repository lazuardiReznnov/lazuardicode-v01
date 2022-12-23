<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Heropage;
use Illuminate\Http\Request;

class DashboardHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.page.hero.index', [
            'title' => 'Hero Page',
            'data' => Heropage::get()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Heropage  $heropage
     * @return \Illuminate\Http\Response
     */
    public function show(Heropage $heropage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Heropage  $heropage
     * @return \Illuminate\Http\Response
     */
    public function edit(Heropage $heropage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Heropage  $heropage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Heropage $heropage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Heropage  $heropage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Heropage $heropage)
    {
        //
    }
}
