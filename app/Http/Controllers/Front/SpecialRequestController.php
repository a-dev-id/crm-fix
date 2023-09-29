<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SpecialRequestMail;
use App\Models\Booking;
use App\Models\Experience;
use App\Models\SpecialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SpecialRequestController extends Controller
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
        SpecialRequest::create([
            'booking_number' => $request->booking_number,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'note' => $request->note,
            'image' => $request->image,
            'status' => $request->status,
        ]);
        return redirect()->route('special-request.show', $request->booking_number);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $check_booking_number = Booking::where('booking_number', $id)->first();

        if ($check_booking_number == null) {
            return redirect()->route('check-in.index')->with('message', 'Invalid Data');
        } elseif ($check_booking_number->check_in_status == null) {
            return redirect()->route('check-in.index')->with('message', 'Please check-in first');
        } else {

            $check_special_request = SpecialRequest::where('booking_number', $check_booking_number->booking_number)->get();
            $special_request_count = $check_special_request->count();

            $experiences = Experience::all();
            $special_requests = SpecialRequest::all();
            return view('front.special_request')->with(compact('special_request_count', 'experiences', 'special_requests', 'check_booking_number', 'check_special_request'));
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
        $booking = Booking::where('booking_number', $id)->first();
        $special_requests = SpecialRequest::where('booking_number', $id)->get();

        $mailData = [
            'booking_number' => $booking->booking_number,
            'email' => $booking->guest->email,
            'arrival' => $booking->arrival,
            'departure' => $booking->departure,
            'guest_full_name' => $booking->guest->title . " " . $booking->guest->first_name . " " . $booking->guest->last_name,
            'special_requests' => $special_requests,
        ];

        // Mail::to($booking->guest->email)
        Mail::to('3xasov@gmail.com')
            ->cc('3xasov@gmail.com')
            ->send(new SpecialRequestMail($mailData));

        foreach ($special_requests as $data) {
            $subdata = SpecialRequest::find($data->id);
            $subdata->status = '1';
            $subdata->save();
        }

        return redirect()->route('thank-you.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SpecialRequest::find($id);
        $data->delete();

        return redirect()->route('special-request.show', $data->booking_number);
    }
}
