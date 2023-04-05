<?php

namespace App\Http\Controllers\Dashboard\Track;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = customer::query();

        $customer->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->name . '%');
        });

        return view('dashboard.track.customer.index', [
            'title' => 'Customer List',
            'datas' => $customer
                ->latest()
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
        return view('dashboard.track.customer.create', [
            'title' => 'Add Customer',
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
            'name' => 'required|unique:customers',
            'slug' => 'required|unique:customers',
            'phone' => 'required',
            'email' => 'required|unique:customers',
            'address' => 'required',
        ]);

        $customer = customer::create($validatedData);

        if ($request->file('pic')) {
            $valid = $request->validate(['pic' => 'image|file|max:2048']);
            $valid['pic'] = $request->file('pic')->store('customer-pic');
            $customer->image()->create($valid);
        }

        return redirect('dashboard/track/customer')->with(
            'success',
            'Data Has Been added.!!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        customer::destroy($customer->id);
        if ($customer->image) {
            foreach ($customer->image as $image) {
                storage::delete($image->pic);
                $image->delete();
            }
        }

        return redirect('/dashboard/track/customer')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            customer::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }
}
