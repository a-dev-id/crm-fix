<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingExperience;
use App\Models\Experience;
use Illuminate\Http\Request;

class BookingExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $check_booking_number = Booking::where('booking_number', $id)->first();

        if ($check_booking_number == null) {
            return redirect()->route('check-in.index')->with('message', 'Invalid Data');
        } elseif ($check_booking_number->check_in_status == '0') {
            return redirect()->route('check-in.index')->with('message', 'Please check-in first');
        } else {
            $experiences = Experience::all();
            return view('front.additional_request')->with(compact('experiences', 'check_booking_number'));
        }
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
