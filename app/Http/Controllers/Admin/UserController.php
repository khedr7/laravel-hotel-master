<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffPasswordRequest;
use App\Http\Requests\StaffRequest;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile.edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10, ['name', 'id', 'email']);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $user = User::create($request->all());
        if ($user) {
            return redirect()->route('admin.users.index')->withStatus(__('Staff is successfully added.'));
        } else {
            return redirect()->route('admin.users.index')->withError(__('a mistake in the deletion process'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, User $user)
    {
        $user->update($request->all());

        return back()->withStatus(__('Staff Info successfully updated.'));
    }

    public function password(StaffPasswordRequest $request, User $user)
    {
        $user->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Staff Password successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('admin.users.index')->withStatus(__('User is successfully deleted.'));
        } else {
            return redirect()->route('admin.users.index')->withError(__('a mistake in the deletion process'));
        }

    }
}
