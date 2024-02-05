<?php

namespace App\Http\Controllers;
use App\Models\student_fee;
use App\Models\addstudent;
use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

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
    public function create_single_voucher(Request $request)
    {
       
        $request->validate([
            'sid' => 'required',
        ]);
    
      
        $student_data = DB::table('addstudents')
            ->join('student_fees', 'addstudents.fee_id_', '=', 'student_fees.fee_id_')
            ->select('addstudents.sid', 'addstudents.student_name', 'addstudents.father_name', 'addstudents.class', 'addstudents.section', 'student_fees.feetype', 'student_fees.tutionfee', 'student_fees.labfee', 'student_fees.examinationfee')
            ->where('addstudents.status', '=', 'active')
            ->where('addstudents.sid', '=', $request->sid)
            ->first(); 
    
            if ($student_data) {
                return view('fee_management/fee_voucher.create_single_voucher')->with('error', 'No student found with the given SID.');

            } else {
                // Return the create_single_voucher view with an error message
                return view('/fee_management/fee_voucher/create_single_voucher')->with('error', 'No student found with the given SID.');
            }
    }
    
    public function single_voucher_to_generate_voucher(){
        
    }

      //generate single fee voucher
    public function generate_voucher(){
      
        return view('/fee_management/fee_voucher/generate_voucher');
    }

    public function print_single_voucher(Request $request){
        $request->validate([
            'sid' => 'required',
            'student_name' => 'required',
            'class' => 'required',
            'section' => 'required',
            'father_name' => 'required',
            'amount' => 'required',
            'feetype' => 'required',
            'expiry_date' => 'required|date',
            'date_issued' => 'required|date',
        ]);
        $voucherNumber = Str::uuid()->toString();

        $data_voucher_in_db = voucher::create([
            'student_name'=>$request->post('student_name'),
            'class'=>$request->post('class'),
            'section'=>$request->post('section'),
            'sid'=>$request->post('sid'),
            'father_name'=>$request->post('father_name'),
            'voucher_number	'=> $voucherNumber,
            'amount'=>$request->post('amount'),
            'expiry_date'=>$request->post('expiry_date'),
            'date_issued'=>$request->post('date_issued'),
            'status'=>'active',
        ]);

        $data =  $request->all();
        $pdf = PDF::loadView('voucher',compact('data'));
        // Save or return the PDF
        // Example: Save PDF to storage
        $pdf_storage = storage_path('app/public/vouchers/'. $data['sid'] . '_voucher.pdf');
        $pdf->save($pdf_storage);
        return $pdf->download('voucher.pdf');
    }

    
}
