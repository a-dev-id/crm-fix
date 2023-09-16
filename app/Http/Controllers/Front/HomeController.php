<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CheckIn;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Title;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.home');
        // return view('front.guest-input');
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
        $booking = Booking::where('booking_number', '=', $request->booking_number)
            ->where('arrival', '=', $request->arrival)
            ->first();

        if ($booking == null) {
            return redirect()->route('check-in.index')->with('message', 'Invalid Data');
        } else {
            $guest = Guest::where('booking_number', '=', $booking->booking_number)
                ->where('last_name', '=', $request->last_name)
                ->first();
            if ($guest == null) {
                return redirect()->route('check-in.index')->with('message', 'Invalid Data');
            }
            return redirect()->route('check-in.show', [$booking->booking_number]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $check_booking_number = Booking::where('booking_number', '=', $id)->first();

        if ($check_booking_number == null) {
            return redirect()->route('check-in.index')->with('message', 'Invalid Data');
        } else {
            $titles = Title::all();
            $countries = Country::all();
            $booking = Booking::where('booking_number', '=', $id)->first();
            $adult = Booking::select('adult')->where('id', '=', $booking->id)->first();
            $child = Booking::select('child')->where('id', '=', $booking->id)->first();
            $guests = Guest::where('booking_number', '=', $id)->get();

            $guest = Guest::where('booking_number', '=', $id)->count();
            $total_guest = ($adult->adult + $child->child) - $guest;

            $check_in_status = CheckIn::where('booking_number', '=', $id)->first();

            return view('front.guest-detail')->with(compact('booking', 'total_guest', 'titles', 'countries', 'guest', 'guests', 'check_in_status'));
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
