<?php

namespace App\Http\Controllers\Dashboard\employee;

use App\Models\employee;
use App\Models\position;
use App\Models\department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\support\Facades\Storage;

class DashboardEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('dashboard.employee.index', [
            'title' => 'Employee',
            'datas' => department::latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(department $department)
    {
        return view('dashboard.employee.create', [
            'title' => 'create New Employee',
            'data' => $department,
            'positions' => position::all(),
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
            'position_id' => 'required',
            'name' => 'required',
            'slug' => 'required|unique:employees',
            'idCard' => 'required|numeric',
            'gender' => 'required',
            'email' => 'required|email|unique:employees',
            'address' => 'required',
            'phone' => 'required|numeric',
            'tgl' => 'required',
        ]);

        $validatedData['department_id'] = $request->department_id;

        employee::create($validatedData);

        return redirect(
            '/dashboard/employee/detail/' . $request->department_slug
        )->with('success', 'New Employee Has Been aded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        return view('dashboard.employee.show', [
            'title' => 'Detail Employee Data',
            'data' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        return view('dashboard.employee.edit', [
            'title' => 'Edit Employee',
            'data' => $employee,
            'positions' => position::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        $rules = [
            'position_id' => 'required',
            'name' => 'required',

            'idCard' => 'required|numeric',
            'gender' => 'required',

            'address' => 'required',
            'phone' => 'required|numeric',
            'tgl' => 'required',
            'pic' => 'image|file|max:2048',
        ];

        if ($request->slug != $employee->slug) {
            $rules['slug'] = 'required|unique:employees';
        }

        if ($request->email != $employee->email) {
            $rules['email'] = 'required|email|unique:employees';
        }
        $validatedData = $request->validate($rules);

        $validatedData['department_id'] = $request->department_id;

        employee::where('id', $employee->id)->update($validatedData);

        return redirect(
            '/dashboard/employee/detail/' . $request->department_slug
        )->with('success', ' Employee Has Been Update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        employee::destroy($employee->id);

        if ($employee->image) {
            storage::delete($employee->image->pic);
            $employee->image->delete();
        }

        return redirect(
            '/dashboard/employee/detail/' . $employee->department->slug
        )->with('success', 'New Post Has Been Deleted.');
    }

    public function detail(department $department)
    {
        return view('dashboard.employee.detail', [
            'title' => 'detail Employee List',
            'department' => $department,
            'datas' => employee::where('department_id', $department->id)
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function createadd(department $department)
    {
        return view('dashboard.employe.create', [
            'title' => 'create New Employee',
            'data' => $department,
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            employee::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }

    public function createimage(employee $employee)
    {
        return view('dashboard.employee.create-image', [
            'title' => 'File Upload',
            'data' => $employee->load('image'),
        ]);
    }

    public function storeimage(Request $request)
    {
        $validatedData = $request->validate([
            'pic' => 'image|file|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

        $validatedData['pic'] = $request->file('pic')->store('employee-pic');

        $employee = employee::find($request->employee_id);

        $employee->image()->create($validatedData);

        return redirect('/dashboard/employee/' . $request->employee_slug)->with(
            'success',
            'New Data Has Been Aded.!'
        );
    }

    public function destroyimage(employee $employee, Request $request)
    {
        $data = $employee
            ->image()
            ->where('id', $request->id)
            ->first();

        storage::delete($data->pic);
        $data->delete();

        return redirect('/dashboard/employee/' . $employee->slug)->with(
            'success',
            'Data Has Been Deleted.!'
        );
    }
}
