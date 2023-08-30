<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Title;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        $guests = Guest::all();
        $titles = Title::all();
        return view('admin.guest.index')->with(compact('guests', 'titles', 'countries'));
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
            'booking_number' => $request->booking_number,
        ]);
        return redirect()->back()->with('message', 'Guest created Successfully');
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
        $data = Guest::find($id);
        $data->title = $request->title;
        $data->full_name = $request->full_name;
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
        $data = Guest::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Item deleted Successfully');
    }
}
