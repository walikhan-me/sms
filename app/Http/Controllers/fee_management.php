<?php

namespace App\Http\Controllers;
use App\Models\student_fee;
use Illuminate\Http\Request;

class fee_management extends Controller
{
    public function create_fee(){
        return view('fee_management/fees/create_fee');
    }

    public function submitfee(Request $request){
        // $request->validate([
        //     'feetype' => 'required|string',
           
            
        // ]);

        $tution_fee =  $request->post('tution_fee',0);
        $lab_fee =  $request->post('lab_fee',0);
        $yearly_fee =  $request->post('yearly_fee',0);

        $fee = new student_fee([
            'feetype'=>$request->post('fee_type'),
            'tutionfee'=>$tution_fee,
            'labfee'=>$lab_fee,
            'yearly'=>$yearly_fee,
            'status'=>$request->post('activefee'),


        ]);
        $fee->save();
        return redirect()->route('create_fee')->with('success', 'Fee submitted successfully!');

       
    }
}
