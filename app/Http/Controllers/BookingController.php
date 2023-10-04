<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Project_brochure;
use App\Models\Project_image;
use App\Models\Project_factsheet;
use App\Models\Honorific;
use App\Models\CountryCode;
use App\Models\Language;
// use Illuminate\Support\include;
// $country = include('data_stores/country_data.php');
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

class BookingController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','show']]);
         $this->middleware('permission:booking-create', ['only' => ['create','store']]);
         $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $this->data['result'] = $result = Booking::all();
        $this->data['count_active'] = $result = Booking::all();
        return view('booking', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $this->data['results'] = $bookings = Booking::select(['id'])->get();
        $this->data['honorifics'] = $honorifics = Honorific::all();
        $this->data['country'] = $country = CountryCode::all();
        // $this->data['country'] = $country;

        return view('booking.create.index', $this->data );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
