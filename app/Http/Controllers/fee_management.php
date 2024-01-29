<?php

namespace App\Http\Controllers;
use App\Models\student_fee;
use App\Models\addstudent;
use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fee_management extends Controller
{
    public function create_fee(){
        return view('fee_management/fees/create_fee');
    }

    public function submitfee(Request $request){
        // $request->validate([
        //     'feetype' => 'required|string',
           
            
        // ]);

        $tution_fee =  $request->post('tution_fee')? 'tution_fee' : 0;
        $lab_fee =  $request->post('lab_fee')? 'lab_fee' : 0;
        $examinationfee =  $request->post('examinationfee')? 'examinationfee' : 0;

        $fee = new student_fee([
            'feetype'=>$request->post('fee_type'),
            'tutionfee'=>$tution_fee,
            'labfee'=>$lab_fee,
            'examinationfee'=>$examinationfee,
            'status' => $request->input('activefee', 'active'),
             'session'=> $request->post('session_'),
             'fee_id_'=>$request->post('fee_id_')

        ]);
        $fee->save();
        return redirect()->route('create_fee')->with('success', 'Fee submitted successfully!');

       
    }
    public function view_fee(){
        $view_fee = student_fee::get();
        return view('/fee_management/fees/view_fee',['view_fees'=>$view_fee]);
    }

    // single fee voucher
    public function single_fee_voucher(){
        return view('/fee_management/fee_voucher/single_fee_voucher');
    }
    public function create_single_voucher(Request $request){
      
        $students = DB::table('addstudents')
        ->join('student_fees', 'addstudents.fee_id_', '=', 'student_fees.fee_id_')
        ->select('addstudents.sid', 'addstudents.student_name', 'addstudents.father_name', 'addstudents.class', 'addstudents.section', 'student_fees.feetype', 'student_fees.tutionfee', 'student_fees.labfee', 'student_fees.examinationfee')
        ->get();
    
            // Pass the data to the generate voucher view
            return view('/fee_management/fee_voucher/generate_voucher', [
                'students' => $students,
            ]);

    }

      //generate single fee voucher
    public function generate_voucher(){
      
        return view('/fee_management/fee_voucher/generate_voucher');
    }

    
}
