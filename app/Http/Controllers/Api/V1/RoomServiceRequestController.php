<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomServiceRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_service_id' => 'required',
            'room_id'         => 'required',
            'customer_id'     => 'required',
            'room_id'         => 'required',
            'notes'           => 'required',
        ]);

        Auth::user()->requests()->create($validated);

        return response(['Request' => 'RoomServiceRequest was created']);
    }
}
