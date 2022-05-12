<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomService;
use Illuminate\Http\Request;

class RoomServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomServices = RoomService::orderBy('created_at', 'desc')->paginate(10, ['id', 'name', 'description', 'status', 'price', 'created_at']);
        return view('room_services.index', compact('roomServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room_services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomService = new RoomService();
        $roomService->name = $request->name;
        $roomService->description = $request->description;
        $roomService->status = $request->status;
        $roomService->price = $request->price;

        if ($request->file('image')) {
            $roomService->addMediaFromRequest('image')->toMediaCollection('room_service');
        }

        $roomService->save();
        if ($roomService)
            return redirect()->route('admin.room-services.index')->withSuccess('room service added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomService  $roomService
     * @return \Illuminate\Http\Response
     */
    public function show(RoomService $roomService)
    {
        return view('room_services.edit', ['roomService' => $roomService]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomService  $roomService
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomService $roomService)
    {
        return view('room_services.edit', ['roomService' => $roomService]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomService  $roomService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomService $roomService)
    {
        if ($request->hasFile('image')) {
            $roomService->clearMediaCollection('room_service');
            $roomService->addMediaFromRequest('image')->toMediaCollection('room_service');
        }
        $info = $request->except('image');
        $roomService->update($info);
        return redirect()->route('admin.room-services.index')->withSuccess('room service updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomService  $roomService
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomService $roomService)
    {
        $roomService->delete();
        return redirect()->route('admin.room-services.index')->withSuccess('room service deleted successfully');
    }
}
