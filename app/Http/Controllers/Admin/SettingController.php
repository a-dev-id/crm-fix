<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index')->with(compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->file('image'))) {
            $image = null;
        } else {
            $image = $request->file('image')->store('images/setting', 'public');
        }

        Setting::create([
            'title' => $request->title,
            'value' => $request->value,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,
        ]);
        return redirect()->route('setting.index')->with('message', 'Setting created Successfully');
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
        $detail = Setting::find($id);
        return view('admin.setting.edit')->with(compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->file('image'))) {
            $image = $request->old_image;
        } else {
            $image = $request->file('image')->store('images/setting', 'public');
        }
        $data = Setting::find($id);
        $data->title = $request->title;
        $data->value = $request->value;
        $data->description = $request->description;
        $data->image = $image;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('setting.index')->with('message', 'Setting updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Setting::find($id);
        $data->delete();

        return redirect()->route('setting.index')->with('message', 'Item deleted Successfully');
    }
}
