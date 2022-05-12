<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use DB;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view any', Review::class);
        $reviews = Review::latest()->paginate(6);
        // $reviews = $reviews->paginate(6);
        return view('admin.reviews.index', ['reviews' => $reviews, 'stats' => $this->claculateRatings()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        // $this->authorize('view ', Review::class);
        return view('admin.reviews.show', ['review' => $review]);
    }
    public function claculateRatings()
    {
        $reviews = Review::all();
        $stars_5 = Review::where('rate', 5)->count();
        $stars_4 = Review::where('rate', 4)->count();
        $stars_3 = Review::where('rate', 3)->count();
        $stars_2 = Review::where('rate', 2)->count();
        $stars_1 = Review::where('rate', 1)->count();
        $avg = number_format((float)$reviews->avg('rate'), 2, '.', '');
        $rates_count = $reviews->count();
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
}
