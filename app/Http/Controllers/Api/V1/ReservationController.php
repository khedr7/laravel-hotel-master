<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $request->validate([
            'name'          => 'nullable',
            'national_id'   => 'nullable|numeric',
            'country'       => 'nullable',
            'phone_number'  => 'required',
            'password'      => 'nullable',
            'room_id'       => 'required',
            'offer_id'      => 'nullable',
            'paid'          => 'required|numeric',
            'started_at'    => 'required|date',
            'ended_at'      => 'required|date',
        ]);

        $user = User::firstOrCreate(['phone_number' => $request->phone_number], [
            'name' => $request->name,
            'national_id' => $request->national_id,
            'country' => $request->country,
        ]);
        $user->assignRole('customer');

        $reservation = new Reservation();
        $reservation->room_id = $request->room_id;
        $reservation->price = $reservation->room->price;
        $reservation->paid = $request->paid;
        $reservation->started_at = $request->started_at;
        $reservation->offer_id = $request->offer_id;
        $reservation->ended_at = $request->ended_at;
        $reservation->user_id = $user->id;

        if ($reservation->offer) {
            if ($reservation->offer->type = 'percentage') {
                $dis = (1 - (0.01 * $reservation->offer->discount));
                $reservation->price = $reservation->room->price * $dis - $reservation->paid;
            } elseif ($reservation->offer->type = 'const') {
                $dis = $reservation->offer->discount * 1;
                $reservation->price = $reservation->room->price - $dis - $reservation->paid;
            }
        }
        if ($reservation->paid != 0) {
            $reservation->transactions()->create([
                'type' => 'In',
                'amount' => $reservation->paid,
                'description' => 'paid at Booking',
            ]);
            $reservation->paid_at = now();
        }

        $reservation->save();
        $reservation->room->update(['status' => 'busy']);

        return response(['message' => 'reservation was created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
