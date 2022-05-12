<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomService;
use App\Models\RoomServiceRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RoomServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('undone_requests') || $request == []) {
            $requests = RoomServiceRequest::whereNull('done_at')->get();
        } elseif ($request->filled('done_requests')) {
            $requests = RoomServiceRequest::whereNotNull('done_at')->get();
        } else {
            $requests = RoomServiceRequest::all();
        }

        return view('room_service-requests.index', [
            'roomServicesRequests' => $requests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create room services requests', RoomServiceRequestController::class);
        $customers = User::role('customer')->get();
        $employees = User::role(['owner', 'manager', 'reception'])->get();
        $roomservices = RoomService::all();
        $rooms = Room::all();
        $reservations = Reservation::all();

        return view(
            'room_service-requests.create',
            [
                'customers'   => $customers,
                'employees'    => $employees,
                'roomservices' => $roomservices,
                'rooms'        => $rooms,
                'reservations' => $reservations
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'room_service_id' => 'required',
                'employee_id'     => 'required',
                'customer_id'     => 'required',
                'room_id'         => 'required',
                'notes'          => 'required'
            ]
        );

        $reservation = Reservation::where("user_id", "=", $request->customer_id)->where("room_id", "=", $request->room_id)->get();
        if ($reservation->empty())
            return redirect()->route('admin.room-service-requests.create')->withStatus(__('Request is successfully added.'));

        $roomservicerequest = new RoomServiceRequest();
        $roomservicerequest->room_service_id = $request->room_service_id;
        $roomservicerequest->room_id = $request->room_id;
        $roomservicerequest->reservation_id = $reservation[0]->id;
        $roomservicerequest->employee_id = $request->employee_id;
        $roomservicerequest->notes = $request->notes;

        $state = $roomservicerequest->save();


        if ($state)
            return redirect()->route('admin.room-service-requests.index')->withStatus(__('Request is successfully added.'));
        else
            return redirect()->route('admin.room-service-requests.index')->withError(__('a mistake in the creating process'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomServiceRequest  $roomSeviceRequest
     * @return \Illuminate\Http\Response
     */
    public function show(RoomServiceRequest $roomSeviceRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomServiceRequest  $roomSeviceRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomServiceRequest $room_service_request)
    {
        $this->authorize('edit room services requests', RoomServiceRequest::class);
        $customers = User::role('customer')->get();
        $employees = User::role(['owner', 'manager', 'reception'])->get();
        $roomservices = RoomService::all();
        $rooms = Room::all();
        $reservation = Reservation::find($room_service_request->reservation_id);


        $custname = User::find($reservation->user_id);
        $roomnumber = Room::find($reservation->room_id);
        $employeename = User::find($room_service_request->employee_id);
        $roomservicename = RoomService::find($room_service_request->room_service_id);
        $notes = $room_service_request->notes;
        return view('room_service-requests.edit', [
            'roomSeviceRequest' => $room_service_request,
            'customers'         => $customers,
            'employees'         => $employees,
            'roomservices'      => $roomservices,
            'rooms'             => $rooms,
            'custname'          => $custname->name,
            'roomnumber'        => $roomnumber->number,
            'employeename'      => $employeename->name,
            'roomservicename'   => $roomservicename->name,
            'notes'             => $notes,
            'customer_id'       => $custname->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomServiceRequest  $roomSeviceRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomServiceRequest $room_service_request)
    {
        $reservation = Reservation::where("user_id", "=", $request->customer_id)->where("room_id", "=", $request->room_id)->get();
        $room_service_request->room_service_id = $request->room_service_id;
        $room_service_request->reservation_id = $reservation[0]->id;
        $room_service_request->room_id = $request->room_id;
        $room_service_request->employee_id = $request->employee_id;
        $room_service_request->notes = $request->notes;
        $room_service_request->save();

        return redirect()->route('admin.room-service-requests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomServiceRequest  $roomSeviceRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomServiceRequest $room_service_request)
    {
        $room_service_request->delete();
        return redirect()->route('admin.room-service-requests.index')->withSuccess('room service deleted successfully');
    }
}
