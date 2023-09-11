<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Guest;
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
            return redirect()->route('check-in.edit', [$booking->id]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $token)
    {
        $result = Booking::where('token', '=', $token)->first();
        return view('front.home')->with(compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = Booking::where('id', '=', $id)->first();
        $adult = Booking::select('adult')->where('id', '=', $id)->first();
        $child = Booking::select('child')->where('id', '=', $id)->first();
        $total_guest = $adult->adult + $child->child;
        return view('front.guest-input')->with(compact('result', 'total_guest'));
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
