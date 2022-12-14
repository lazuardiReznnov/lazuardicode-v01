<?php

namespace App\Http\Controllers\Dashboard\Unit\Letter;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use App\Models\CategoryLetter;
use Illuminate\Http\Request;

class DashboardLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.unit.letter.index', [
            'title' => 'Category Letter',
            'data' => CategoryLetter::latest()->get(),
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
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        return view('dashboard.unit.letter.show', [
            'title' => 'Detail Letter',
            'data' => $letter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        //
    }

    public function data(CategoryLetter $categoryletter)
    {
        return view('dashboard.unit.letter.data', [
            'title' => 'Letters Data',
            'datas' => $categoryletter
                ->letter()
                ->latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }
}
