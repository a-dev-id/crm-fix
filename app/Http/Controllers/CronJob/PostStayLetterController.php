<?php

namespace App\Http\Controllers\CronJob;

use App\Http\Controllers\Controller;
use App\Mail\PostStayLetter;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostStayLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::where('check_in_status', '1')->where('confirmation_letter_status', '1')->where('pre_arrival_status', '1')->whereRaw('DATE_ADD(`departure`, INTERVAL 1 DAY) <= NOW()')->first();

        $mailData = [
            'guest_full_name' => $booking->guest->title . " " . $booking->guest->first_name . " " . $booking->guest->last_name,
        ];

        Mail::to($booking->guest->email)
            ->cc('3xasov@gmail.com')
            ->send(new PostStayLetter($mailData));
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
