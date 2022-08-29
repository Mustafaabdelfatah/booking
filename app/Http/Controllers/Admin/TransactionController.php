<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slot;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function attribute(Request $request, $id = null){
        $slotDetails = Slot::with(['transactions'])
            ->where(['id' => $id])
            ->first();
        return view('admin.slots.attribute',compact('slotDetails'));

    }
    public function addDetails(Request $request,$id=null){

        // return $request->all();
            $validation = $request->validate([
                'time_from' => 'required|date_format:H:i',
                'time_to' => 'required|date_format:H:i',
                'duration' => 'required',
            ]);

            // return $request->all();
            $attr = Transaction::create([
            'slot_id' => $id,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'duration' => $request->duration,
        ]);
        session()->flash('success', 'Details Created Successfully');
        return redirect()->back();
    }
    public function editDetails(){

    }
    public function deleteAttribute(){

    }
}
