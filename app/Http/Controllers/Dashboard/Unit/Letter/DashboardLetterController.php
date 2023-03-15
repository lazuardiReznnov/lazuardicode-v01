<?php

namespace App\Http\Controllers\Dashboard\Unit\Letter;

use App\Models\flag;
use App\Models\unit;
use App\Models\Letter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryLetter;
use App\Imports\Unit\lettersImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\support\Facades\Storage;

class DashboardLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
        return view('dashboard.unit.letter.create', [
            'title' => 'Add Letter Unit Data',
            'units' => unit::all(),
            'categorys' => CategoryLetter::all(),
            'flags' => flag::all(),
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
        $rules = [
            'category_letter_id' => 'required',
            'unit_id' => 'required',
            'regNum' => 'required',
            'owner' => 'required',
            'owner_add' => 'required',
            'reg_year' => 'required',
            'loc_code' => 'required',
            'lpc' => 'required',
            'vodn' => 'required',
            'expire_date' => 'required',
        ];

        if ($request->category_letter_id == 1) {
            $rules['tax'] = 'required';
        }

        $validatedData = $request->validate($rules);

        $str_rand = Str::random(3);
        $validatedData['slug'] = Str::of(
            $str_rand . ' ' . $request->regNum
        )->slug('-');

        Letter::create($validatedData);

        return redirect('/dashboard/unit/letter')->with(
            'success',
            'New Post Has Been Created.'
        );
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
            'title' =>
                $letter->unit->name . '-' . $letter->categoryLetter->name,
            'data' => $letter->load('file'),
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
        return view('dashboard.Unit.letter.edit', [
            'title' => 'Edit Unit Letter Data',
            'data' => $letter,
            'categorys' => CategoryLetter::all(),
            'units' => unit::all(),
        ]);
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
        $rules = [
            'category_letter_id' => 'required',
            'unit_id' => 'required',
            'regNum' => 'required',
            'owner' => 'required',
            'owner_add' => 'required',
            'reg_year' => 'required',
            'loc_code' => 'required',
            'lpc' => 'required',
            'vodn' => 'required',
            'expire_date' => 'required',
        ];

        if ($request->category_letter_id == 1) {
            $rules['tax'] = 'required';
        }

        $validatedData = $request->validate($rules);

        Letter::where('id', $letter->id)->update($validatedData);

        return redirect('/dashboard/unit/letter')->with(
            'success',
            'New Post Has Been Created.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letter  $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        Letter::destroy($letter->id);
        if ($letter->pic) {
            storage::delete($letter->pic);
        }
        return redirect('/dashboard/unit/letter')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function data(CategoryLetter $categoryletter)
    {
        if (request('month')) {
            $month = request('month');
            $pisah = explode('-', $month);
            if ($categoryletter->id === 1) {
                $data = Letter::whereMonth('tax', '=', $pisah[1])->whereYear(
                    'tax',
                    '=',
                    $pisah[0]
                );
            } elseif ($categoryletter->id === 2) {
                $data = Letter::whereMonth(
                    'expire_date',
                    '=',
                    $pisah[1]
                )->whereYear('expire_date', '=', $pisah[0]);
            }
            $head = request('month');
        } else {
            if ($categoryletter->id === 1) {
                $data = Letter::whereMonth('tax', '=', date('m'));
            } elseif ($categoryletter->id === 2) {
                $data = Letter::whereMonth('expire_date', '=', date('m'));
            }
            $head = date('F');
        }

        return view('dashboard.unit.letter.data', [
            'title' => $categoryletter->name,
            'slug' => $categoryletter->slug,
            'heads' => $head,
            'datas' => $data
                ->where('category_letter_id', $categoryletter->id)
                ->paginate(10)
                ->withQueryString(),
            // 'datas' => $categoryletter
            //     ->letter()
            //     ->latest()
            //     ->paginate(10)
            //     ->withQueryString(),
        ]);
    }

    public function createexcl()
    {
        return view('dashboard.Unit.letter.create-excel', [
            'title' => 'File Import Via Excel',
        ]);
    }

    public function storeexcl(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new lettersImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/letter')->with(
                'success',
                'New Data Has Been Aded.!'
            );
        }
    }

    public function print(Letter $letter)
    {
        return view('dashboard.Unit.letter.print', [
            'title' => 'power of attorney',
            'data' => $letter,
        ]);
    }

    public function addfile(Letter $letter)
    {
        return view('dashboard.Unit.letter.add-file', [
            'title' => $letter->unit->name . ' Upload File',
            'data' => $letter,
        ]);
    }

    public function storefile(Request $request)
    {
        $validatedData = $request->validate([
            'pic' => 'mimes:pdf,jpeg,png|file|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

        $validatedData['pic'] = $request->file('pic')->store('letter-pic');

        $letter = Letter::find($request->letter_id);

        $letter->file()->create($validatedData);

        return redirect(
            '/dashboard/unit/letter/' . $request->letter_slug
        )->with('success', 'New Data Has Been Aded.!');
    }
}
