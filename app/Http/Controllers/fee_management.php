<?php

namespace App\Http\Controllers;
use App\Models\student_fee;
use App\Models\addstudent;
use App\Models\voucher;
use App\Models\voucher_dates;
use App\Models\recieved_fee_amount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'student_cid' => 'required',
        ]);
    
      
        $student_data = DB::table('addstudents')
            ->join('student_fees', 'addstudents.fee_id_', '=', 'student_fees.fee_id_')
            ->join('voucher_dates', 'addstudents.fee_id_', '=', 'voucher_dates.single_student_voucher_id')
            ->select('addstudents.sid', 'addstudents.student_name', 'addstudents.father_name', 'addstudents.class', 'addstudents.section','student_fees.feetype', 'student_fees.tutionfee', 'student_fees.labfee', 'student_fees.examinationfee','voucher_dates.charge_date','voucher_dates.posting_date')
            ->where('addstudents.status', '=', 'active')
            ->where('addstudents.sid', '=', $request->student_cid)
            ->first(); 
          
    
            if ($student_data) {
                return view('fee_management/fee_voucher.generate_voucher', compact('student_data'));
            } else {
                return view('/fee_management/fee_voucher/create_single_voucher')
                    ->with('error', 'No student found with the given SID.')
                    ->withInput();
            }
    }
    
    public function single_voucher_to_generate_voucher(){
        
    }

      //generate single fee voucher
    public function generate_voucher(){
      

        return view('/fee_management/fee_voucher/generate_voucher');
    }
    public function voucher(){
        return view('/fee_management/fee_voucher/voucher');        
    }
    public function print_single_voucher(Request $request){
    
      $var =   $request->validate([
            'sid' => 'required',
            'student_name' => 'required',
            'class' => 'required',
            'section' => 'required',
            'father_name' => 'required',
            'voucher_type' =>'required',
            'amount' => 'required',
            'feetype' => 'required',
            'expiry_date' => 'required|date',
            'date_issued' => 'required|date',
        ]);
      
        
        $voucher_id = rand(1000,9999);
        $data_voucher_in_db = voucher::create([
            'voucher_id'=> $voucher_id,
            'student_name'=>$request->post('student_name'),
            'class'=>$request->post('class'),
            'section'=>$request->post('section'),
            'sid'=>$request->post('sid'),
            'father_name'=>$request->post('father_name'),
            'voucher_type' => $request->post('voucher_type'),
            'voucher_number	'=> Str::uuid()->toString(),
            'amount'=>$request->post('amount'),
            'expiry_date'=>$request->post('expiry_date'),
            'date_issued'=>$request->post('date_issued'),
            'status'=>'active',
        ]);
       
        $data =  $request->all();
       
        $pdf = PDF::loadView('fee_management.fee_voucher.voucher',compact('data'));

      
        $pdf_storage = storage_path('app/public/vouchers/'.$data['sid'].'_voucher.pdf');

    
        $pdf->save($pdf_storage);
        
         $voucher_name = $data['sid'].'_'.$data['student_name'].'.pdf';
        return $pdf->download($voucher_name);
    }

    public function charge_date(){
        return view('/fee_management/fee_voucher/charge_date');
    }
    public function post_charge_date(Request $request){
       $validation = $request->validate([
        'fee_voucher_type'=>'required',
         'date_issued_for_voucher'=>'required',
         'date_posting_for_voucher'=>'required',
       ]);
       if($request->post('fee_voucher_type')==1){
        $vocher_date = voucher_dates::create([
            'single_student_voucher_id'=>$request->post('fee_voucher_type'),
            'bulk_student_voucher_id'=>0,
            'charge_date'=>$request->post('date_issued_for_voucher'),
            'posting_date'=>$request->post('date_issued_for_voucher'),
        ]);
        if( $vocher_date->save()){
            return redirect('/fee_management/fee_voucher/single_fee_voucher');
        }
       }
       else{
        $vocher_date= voucher_dates::create([
            'single_student_voucher_id'=>0,
            'bulk_student_voucher_id'=>$request->post('fee_voucher_type'),
            'charge_date'=>$request->post('date_issued_for_voucher'),
            'posting_date'=>$request->post('date_issued_for_voucher'),
        ]);
       
        if( $vocher_date->save()){
            return redirect('/fee_management/fee_voucher/single_fee_voucher');
        }
       }
      
       
      
    }

    public function fee_posting(){
        return view('/fee_management/fee_voucher/fee_posting');
    }
    public function fee_posting_form(Request $request){
      
        $request->validate([
            'student_cid' => 'required',
        ]);
    
      
        $student_data = DB::table('vouchers')
          
            ->select('voucher_id','student_name','class','section','sid','father_name','voucher_type','amount','expiry_date','date_issued','status')
            ->where('status', '=', 'active')
            ->where('vouchers.sid', '=', $request->student_cid)
            ->first(); 
        
        if ($student_data) {
           
            return view('fee_management/fee_voucher.view_fee_posting_form', compact('student_data'));
        }
        else {
            
            return view('/fee_management/fee_voucher/fee_posting')
                ->with('error', 'No student found with the given SID.')
                ->withInput();
        }
    }
    public function view_fee_posting_form(){
        return view('/fee_management/fee_voucher/view_fee_posting_form');
    }
    public function submit_student_fee(Request $request){
        $valid_data =  $request->validate([
            'sid' => 'required',
            'student_name' => 'required',
            'class' => 'required',
            'section' => 'required',
            'father_name' => 'required',
            'voucher_type' => 'required',
            'expiry_date' => 'required',
            'date_issued' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'voucher_id'=>'required'
        ]);
       
       
        if($request->input('status')=='active' ){
           $posting_data = recieved_fee_amount::create([
            'voucher_id'=>$request->input('voucher_id'),
            'student_name'=>$request->input('student_name'),
            'class'=>$request->input('class'),
            'section'=>$request->input('section'),
            'sid'=>$request->input('sid'),
            'father_name'=>$request->input('father_name'),
            'voucher_type'=>$request->input('voucher_type'),
            'voucher_number'=>'reminder',
            'amount'=>$request->input('amount'),
            'expiry_date'=>$request->input('expiry_date'),
            'date_issued'=>$request->input('date_issued'),
            'status'=>'inactive',
           ]);
           
            // Update the 'status' field in the 'voucher' table
           if($posting_data->save()){
            $update_voucher_status = voucher::where('voucher_id',$request->input('voucher_id'))->first();
            if($update_voucher_status){
                $update_voucher_status->update([
                    'status'=>'inactive'
                ]);
            }
           }
        }
       
    }
    public function active_vouchers()
    { 
        $active_vouchers =  voucher::all();
        return view('fee_management.voucher.active_vouchers',['activeStudent'=>$active_vouchers]);
    }

    
}
