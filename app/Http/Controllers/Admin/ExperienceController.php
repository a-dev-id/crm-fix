<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experience.index')->with(compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->file('image'))) {
            $image = null;
        } else {
            $image = $request->file('image')->store('images/experience', 'public');
        }

        Experience::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'note' => $request->note,
            'button_label' => $request->button_label,
            'button_link' => $request->button_link,
            'image' => $image,
            'order' => $request->order,
            'status' => $request->status,
        ]);
        return redirect()->route('experience.index')->with('message', 'Room created Successfully');
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
        $detail = Experience::find($id);
        return view('admin.experience.edit')->with(compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('image'))) {
            $image = $request->old_image;
        } else {
            $image = $request->file('image')->store('images/experience', 'public');
        }
        $data = Experience::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->note = $request->note;
        $data->button_label = $request->button_label;
        $data->button_link = $request->button_link;
        $data->image = $image;
        $data->order = $request->order;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('experience.index')->with('message', 'Room updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Experience::find($id);
        $data->delete();

        return redirect()->route('experience.index')->with('message', 'Item deleted Successfully');
    }
}
