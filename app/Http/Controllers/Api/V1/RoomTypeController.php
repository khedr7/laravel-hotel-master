<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomTypeResource;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'price'    => 'numeric',
        ]);
        $roomTypes = RoomType::latest();
        $items = RoomType::all();

        if ($request->filled('sort')) {
            if ($request->filled('order')) {
                if ($request->order == 'ascending') {
                    if ($request->sort == 'name_ar') {
                        $roomTypes = RoomType::orderBy('name->ar', 'asc');
                    }
                    if ($request->sort == 'name_en') {
                        $roomTypes = RoomType::orderBy('name', 'asc');
                    }
                    if ($request->sort == 'price') {
                        $roomTypes = RoomType::orderBy('price', 'asc');
                    }
                    if ($request->sort == 'creation_date') {
                        $roomTypes = RoomType::orderBy('created_at', 'asc');
                    }
                }
                if ($request->order == 'descending') {
                    if ($request->sort == 'name_ar') {
                        $roomTypes = RoomType::orderBy('name->ar', 'desc');
                    }
                    if ($request->sort == 'name_en') {
                        $roomTypes = RoomType::orderBy('name', 'desc');
                    }
                    if ($request->sort == 'price') {
                        $roomTypes = RoomType::orderBy('price', 'desc');
                    }
                    if ($request->sort == 'creation_date') {
                        $roomTypes = RoomType::orderBy('created_at', 'desc');
                    }
                }
            }
            else {
                if ($request->sort == 'name_ar') {
                    $roomTypes = RoomType::orderBy('name->ar', 'asc');
                }
                if ($request->sort == 'name_en') {
                    $roomTypes = RoomType::orderBy('name', 'asc');
                }
                if ($request->sort == 'price') {
                    $roomTypes = RoomType::orderBy('price', 'asc');
                }
                if ($request->sort == 'creation_date') {
                    $roomTypes = RoomType::orderBy('created_at', 'asc');
                }
            }
        }

        if ($request->filled('price_filter')) {
            $roomTypes->whereIn('price', $request->price_filter);
        }
        if ($request->filled('q')) {
            $roomTypes->where('name', 'like', "%$request->q%");
            $roomTypes->orWhere('price', 'like', "%$request->q%");
            $roomTypes->orWhere('description', 'like', "%$request->q%");
        }

        $roomTypes  = $roomTypes->paginate(10);$request->validate([
            'price'    => 'numeric',
        ]);
        $roomTypes = RoomType::latest();
        $items = RoomType::all();

        if ($request->filled('sort')) {
            if ($request->filled('order')) {
                if ($request->order == 'ascending') {
                    if ($request->sort == 'name_ar') {
                        $roomTypes = RoomType::orderBy('name->ar', 'asc');
                    }
                    if ($request->sort == 'name_en') {
                        $roomTypes = RoomType::orderBy('name', 'asc');
                    }
                    if ($request->sort == 'price') {
                        $roomTypes = RoomType::orderBy('price', 'asc');
                    }
                    if ($request->sort == 'creation_date') {
                        $roomTypes = RoomType::orderBy('created_at', 'asc');
                    }
                }
                if ($request->order == 'descending') {
                    if ($request->sort == 'name_ar') {
                        $roomTypes = RoomType::orderBy('name->ar', 'desc');
                    }
                    if ($request->sort == 'name_en') {
                        $roomTypes = RoomType::orderBy('name', 'desc');
                    }
                    if ($request->sort == 'price') {
                        $roomTypes = RoomType::orderBy('price', 'desc');
                    }
                    if ($request->sort == 'creation_date') {
                        $roomTypes = RoomType::orderBy('created_at', 'desc');
                    }
                }
            }
            else {
                if ($request->sort == 'name_ar') {
                    $roomTypes = RoomType::orderBy('name->ar', 'asc');
                }
                if ($request->sort == 'name_en') {
                    $roomTypes = RoomType::orderBy('name', 'asc');
                }
                if ($request->sort == 'price') {
                    $roomTypes = RoomType::orderBy('price', 'asc');
                }
                if ($request->sort == 'creation_date') {
                    $roomTypes = RoomType::orderBy('created_at', 'asc');
                }
            }
        }

        if ($request->filled('price_filter')) {
            $roomTypes->whereIn('price', $request->price_filter);
        }
        if ($request->filled('q')) {
            $roomTypes->where('name', 'like', "%$request->q%");
            $roomTypes->orWhere('price', 'like', "%$request->q%");
            $roomTypes->orWhere('description', 'like', "%$request->q%");
        }

        $roomTypes  = $roomTypes->paginate(10);
        return RoomTypeResource::collection(['roomTypes'=>$roomTypes, 'items' => $items]);
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
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        $mediaItems = $roomType->getMedia('images');
        return new RoomTypeResource(['roomType' => $roomType, 'mediaItems' => $mediaItems]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        //
    }
}
