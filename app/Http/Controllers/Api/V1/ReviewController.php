<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Review::latest()->paginate(6);
    }

    public function stats()
    {
        $stars_5 = Review::where('rate', 5)->count();
        $stars_4 = Review::where('rate', 4)->count();
        $stars_3 = Review::where('rate', 3)->count();
        $stars_2 = Review::where('rate', 2)->count();
        $stars_1 = Review::where('rate', 1)->count();

        $avg = number_format((float)Review::avg('rate'), 2, '.', ',');
        $rates_count = Review::count();

        return [
            'One Star' => $stars_1,
            'Tow Stars' => $stars_2,
            'Three Stars' => $stars_3,
            'Four Stars' => $stars_4,
            'Five Stars' => $stars_5,
            'average' => $avg,
            'Rates count' => $rates_count
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'job_title' => 'required',
            'rate' => 'required',
            'message' => 'required',
        ]);

        Auth::user()->reviews()->create($validated);

        return response(['message' => 'review was created'], 201);
    }
}
