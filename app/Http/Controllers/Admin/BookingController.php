<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Title;
use App\Models\Villa;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booking.index')->with(compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        $guests = Guest::where('booking_number', null)->get();
        $titles = Title::all();
        $villas = Villa::all();
        return view('admin.booking.create')->with(compact('countries', 'guests', 'titles', 'villas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Booking::create([
            'guest_id' => $request->guest_id,
            'booking_number' => $request->booking_number,
            'arrival' => $request->arrival,
            'departure' => $request->departure,
            'villa_id' => $request->villa_id,
            'adult' => $request->adult,
            'child' => $request->child,
            'total_charge' => $request->total_charge,
            'campaign_name' => $request->campaign_name,
            'campaign_benefit' => $request->campaign_benefit,
            'remarks' => $request->remarks,
            'status' => '0',
        ]);

        $guest =  Guest::find($request->guest_id);
        $guest->booking_number = $request->booking_number;
        $guest->save();
        return redirect()->route('booking.index')->with('message', 'New booking created Successfully');
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
