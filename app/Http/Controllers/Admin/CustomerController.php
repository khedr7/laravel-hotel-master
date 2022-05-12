<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::paginate(10);
        return view('admin.customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'national_id' => 'required|min:5',
            'country' => 'required|min:3',
            'phone' => 'required'
        ]);

        $customer = new User();
        $customer->name = $request->name;
        $customer->national_id = $request->national_id;
        $customer->country = $request->country;
        $customer->phone = $request->phone;
        $customer->save();
        $customer->assignRole('customer');
        return redirect()->route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::find($id);
        return view('admin.customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $customer)
    {
        return view('admin.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = User::find($id);
        $this->validate($request, [
            'name' => 'required|min:3',
            'national_id' => 'required|min:5',
            'country' => 'required|min:3',
            'phone' => 'required'
        ]);
        $customer->name = $request->name;
        $customer->national_id = $request->national_id;
        $customer->country = $request->country;
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
