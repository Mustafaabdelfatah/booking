<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlotController extends Controller
{

    public function index()
    {
        $slots = Slot::get();
        return view('admin.slots.index', compact('slots'));
    }


    public function create()
    {
        return view('admin.slots.create');
    }


    public function store(Request $request)
    {

        // return $request->all();
        $validation = $request->validate([
            'day' => 'required|date|date_format:Y-m-d',
        ]);
        Slot::create($request->all());
        session()->flash('success', 'Slot Created Successfully');
        return redirect()->route('admin.slots.index');
    }


    public function edit($id)
    {
        $slot = Slot::find($id);
        return view('admin.slots.edit',compact('slot'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slot = Slot::find($id);
        $validation = $request->validate([
            'day' => 'required|date|date_format:Y-m-d',
        ]);
        $slot->update($request->all());
        // Slot::create($request->all());
        session()->flash('success', 'Slot Updated Successfully');
        return redirect()->route('admin.slots.index');
    }


    public function destroy($id)
    {
        $slot = Slot::find($id)->delete();
        session()->flash('success', 'Slot Deleted Successfully');
        return redirect()->route('admin.slots.index');
    }


}
