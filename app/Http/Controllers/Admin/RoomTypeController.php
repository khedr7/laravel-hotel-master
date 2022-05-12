<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('view all roomType', RoomType::class);
        // dd('test');

        $request->validate([
            'price'    => 'numeric',
        ]);
        $roomTypes = RoomType::latest();
        $items = RoomType::all();

        if ($request->filled('sort')) {
            if ($request->filled('order')) {
                if ($request->order == 'ascending') {
                    // if ($request->sort == 'name_ar') {
                    //     $roomTypes = RoomType::orderBy('name', 'asc');
                    // }
                    // if ($request->sort == 'name_en') {
                    //     $roomTypes = RoomType::orderBy('name', 'asc');
                    // }
                    if ($request->sort == 'price') {
                        $roomTypes = RoomType::orderBy('price', 'asc');
                    }
                    if ($request->sort == 'creation_date') {
                        $roomTypes = RoomType::orderBy('created_at', 'asc');
                    }
                }
                if ($request->order == 'descending') {
                    // if ($request->sort == 'name_ar') {
                    //     $roomTypes = RoomType::orderBy('name->ar', 'desc');
                    // }
                    // if ($request->sort == 'name_en') {
                    //     $roomTypes = RoomType::orderBy('name', 'desc');
                    // }
                    if ($request->sort == 'price') {
                        $roomTypes = RoomType::orderBy('price', 'desc');
                    }
                    if ($request->sort == 'creation_date') {
                        $roomTypes = RoomType::orderBy('created_at', 'desc');
                    }
                }
            }
            else {
                // if ($request->sort == 'name_ar') {
                //     $roomTypes = RoomType::orderBy('name->ar', 'asc');
                // }
                // if ($request->sort == 'name_en') {
                //     $roomTypes = RoomType::orderBy('name', 'asc');
                // }
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
        return view('admin.roomTypes.index', ['roomTypes' => $roomTypes, 'items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create roomType', RoomType::class);
        return view('admin.roomTypes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->authorize('create roomType', RoomType::class);
        // $request->dd();
        $validation = $request->validate([
            'name'     => 'required',
            'name.*'     => 'required|min:3',
            'price'   => 'required|numeric',
            'description'    => 'required',
            'description.*'    => 'required',
            'images'    => 'required|array',
            'images.*'    => 'required|file|image',
        ]);

        foreach ($validation['description'] as $description) {
            $description = Purify::clean($request->$description);
        }
        $roomType = RoomType::create($validation);
        if ($request->hasFile('images')) {
            $fileAdders = $roomType->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('images');
                    });
        }

        return redirect()->route('admin.room-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        // $this->authorize('show roomType', RoomType::class);
        $mediaItems = $roomType->getMedia('images');
        return view('admin.roomTypes.show', ['roomType' => $roomType, 'mediaItems' => $mediaItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        // $this->authorize('edit roomType', $roomType);
        $mediaItems = $roomType->getMedia('images');

        return view('admin.roomTypes.edit', ['roomType' => $roomType, 'mediaItems' => $mediaItems]);

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
        $validation = $request->validate([
            'name'     => 'required',
            'name.*'     => 'required|min:3',
            'price'   => 'required|numeric',
            'description'   => 'required',
            'description.*'   => 'required',
            'images'    => 'required|array',
            'images.*'    => 'required|file|image',
        ]);


        foreach ($validation['name'] as $lang => $name) {
            $roomType->setTranslation('name', $lang, Purify::clean($name));
        }
        $roomType->price = $validation['price'];
        foreach ($validation['description'] as $lang => $description) {
            $roomType->setTranslation('description', $lang, Purify::clean($description));
        }

        // if ($request->hasFile('images')) {
        //     $roomType->clearMediaCollection('images');
        //     foreach ($request->input('images', []) as $image) {
        //         $roomType->addMediaFromRequest('image')->toMediaCollection('images');
        //     }
        //  }
        $roomType->save();
        // $request->dd();
        if ($request->hasFile('images')) {
            $roomType->clearMediaCollection('images');
            $fileAdders = $roomType->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }

        return redirect()->route('admin.room-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        // $this->authorize('delete roomType', $roomType);
        $roomType->delete();
        return redirect()->route('admin.room-types.index');
    }
}
