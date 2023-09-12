<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class PassportController extends Controller
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
        if (!empty($request->file('identity'))) {
            $identity = $request->file('identity')->store('images/identity', 'public');
        }

        $data = Guest::create([
            'identity' => $identity,
            'booking_number' => $request->booking_number,
        ]);
        return redirect()->route('upload-credit-card.edit', $data->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $booking_number)
    {
        return view('front.upload-passport')->with(compact('booking_number'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('front.upload-passport')->with(compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('identity'))) {
            $identity = $request->old_identity;
        } else {
            $identity = $request->file('identity')->store('images/identity', 'public');
        }

        $data = Guest::find($id);
        $data->identity = $identity;
        $data->save();

        return redirect()->route('upload-credit-card.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
