<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Heropage;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

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
        $rules = [
            'heading' => 'required',
            'title' => 'required',
            'descriptions' => 'required',
            'pic' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);
        if ($request->file('pic')) {
            if ($request->old_pic) {
                storage::delete($request->old_pic);
            }
            $validatedData['pic'] = $request->file('pic')->store('page-pic');
        }

        Heropage::where('id', $heropage->id)->update($validatedData);
        return redirect('dashboard/page/heropage')->with(
            'success',
            'Data Has Been Updated'
        );
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
