<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;

class CreditCardController extends Controller
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
        return view('front.upload-credit-card')->with(compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('credit_card'))) {
            $credit_card = $request->old_credit_card;
        } else {
            $credit_card = $request->file('credit_card')->store('images/credit_card', 'public');
        }

        $data = Guest::find($id);
        $data->credit_card = $credit_card;
        $data->save();

        return redirect()->route('guest-detail.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
