<?php

namespace App\Http\Controllers\CronJob;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationLetter;
use App\Models\Booking;
use App\Models\Guest;
use App\Models\Setting;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfirmationLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::where('check_in_status', '1')->where('confirmation_letter_status', '0')->first();

        $mailData = [
            'booking_number' => $booking->booking_number,
            'arrival' => $booking->arrival,
            'departure' => $booking->departure,
            'adult' => $booking->adult,
            'child' => $booking->child,
            'total_charge' => $booking->total_charge,
            'campaign_name' => $booking->campaign_name,
            'campaign_benefit' => $booking->campaign_benefit,
            'remarks' => $booking->remarks,
            'villa_title' => $booking->villa->title,
            'villa_description' => $booking->villa->description,
            'villa_image' => $booking->villa->image,
            'guest_full_name' => $booking->guest->title . " " . $booking->guest->first_name . " " . $booking->guest->last_name,
        ];

        Mail::to($booking->guest->email)
            ->cc('3xasov@gmail.com')
            ->send(new ConfirmationLetter($mailData));

        $data = Booking::find($booking->id);
        $data->confirmation_letter_status = '1';
        $data->save();
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
