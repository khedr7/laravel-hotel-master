<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Http\Resources\RoomsResource;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'room_type_id'  => 'numeric'
        ]);

        $rooms = Room::query();

        if ($request->filled('q')) {
            $rooms->where('number', 'like', "%$request->q%");
            $rooms->orwhere('beds', 'like', "%$request->q%");
            $rooms->orWhere('price', 'like', "%$request->q%");
            $rooms->orWhere('description', 'like', "%$request->q%");
            $rooms->orWhere('story', 'like', "%$request->q%");
            $rooms->orWhere('status', 'like', "%$request->q%");
        }

        if ($request->filled('roomTypes')) {
            $rooms->whereIn('room_type_id', $request->roomTypes);
        }

        if ($request->filled('room_status')) {
            $rooms->whereIn('status->en', $request->room_status);
        }

        if ($request->filled('room_beds')) {
            $rooms->whereIn('beds', $request->room_beds);
        }

        if ($request->filled('room_story')) {
            $rooms->whereIn('story', $request->room_story);
        }

        return RoomsResource::collection($rooms->paginate(10));
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
