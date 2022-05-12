<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use DB;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee = User::latest();

        if ($request->filled('q')) {
            $employee->where('name', 'like', "%$request->q%");
            $employee->orWhere('country', 'like', "%$request->q%");
            $employee->orWhere('job_title', 'like', "%$request->q%");
        }
        $employees = $employee->paginate(5);

        return view('employees.index', ['employees' => $employees]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'     => 'required|min:3',
            'national_id'   => 'required',
            'country'   => 'required',
            'phone'    => 'required',
            'password'    => 'required',
            'salary'   => 'required',
            'job_title'  =>  'required',
            'featured_image'    => 'required|file|image',
        ]);
        $validation['featured_image'] = $request->featured_image->store('public/images');
        $employee = User::create($validation);

        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('employees.edit',['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $request->validate([
            'name'     => 'required|min:3',
            'phone'    => 'required',
            'country'   => 'required',
            'national_id'   => 'required',
            'salary'   => 'required',
        ]);

        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->country = $request->country;
        $employee->national_id = $request->national_id;
        $employee->salary = $request->salary;
        $employee->save();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->delete();

        return redirect()->route('admin.employees.index');
    }
}
