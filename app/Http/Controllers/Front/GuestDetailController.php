<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Title;
use Illuminate\Http\Request;

class GuestDetailController extends Controller
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
        $titles = Title::all();
        $countries = Country::all();
        return view('front.guest-update')->with(compact('titles', 'countries'));
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
        $titles = Title::all();
        $countries = Country::all();
        $guest = Guest::find($id);
        return view('front.guest-update')->with(compact('titles', 'countries', 'guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, string $booking_number)
    {
        $data = Guest::find($id);
        $data->title = $request->title;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->country = $request->country;
        $data->birth_date = $request->birth_date;
        $data->save();
        return redirect()->back()->with('message', 'Guest updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
