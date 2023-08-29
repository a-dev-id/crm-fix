<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.guest.index');
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
        Guest::create([
            'title' => $request->title,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'birth_date' => $request->birth_date,
            'identity' => $request->identity,
            'credit_card' => $request->credit_card,
            'sign' => $request->sign,
            'booking_number' => $request->booking_number,
            'booking_date' => $request->booking_date,
        ]);
        // return redirect()->route('guest.index')->with('message', 'New booking created Successfully');
        return redirect()->back();
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
