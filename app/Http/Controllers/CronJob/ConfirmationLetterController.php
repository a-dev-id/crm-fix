<?php

namespace App\Http\Controllers\CronJob;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmationLetter;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConfirmationLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::where('confirmation_letter_status', '=', '0')->first();
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
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
