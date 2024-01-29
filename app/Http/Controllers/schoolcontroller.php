<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\schoolmodel;
use App\Models\addstudent;
use App\Models\inactivestudent;

class schoolcontroller extends Controller
{
   public function addschool(){
    return view('addschool');
   }

   public function view_school(){
    return view('view_school');
   }

   //view_school


   public function getCitiesByProvince(Request $request)
    {
        $provinceId = $request->input('province_id');
        $cities = City::where('city_id', $provinceId)->get();

        return response()->json($cities);
    }


    public function store(Request $request){

      //  $validation  = $request->validate([
      //   "schoolname"=>"required",
      //   "address"=>"required",
      //   "contactnumber"=>"required|digits:11",
      //   "city"=>"required",
      //   "province"=>"required",
      //   "block"=>"required",
      //   "ownername"=>"required",
      //   "schoollogo"=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      // ]);
      // if($validation->fails()){
      //     return response()->json(['errors' => $validator->errors()], 422);
      // }
      $items = new schoolmodel();
      $items->city = $request->city;
      $items->province= $request->province;
      
      $items->schoolname = $request->schoolname;
     
      $items->address= $request->address;
    
      $items->contactnumber= $request->contactnumber;
      
      $items->block= $request->block;
      $items->ownername= $request->ownername;

     
      

      if($request->hasFile('schoollogo')){
        
        $file= $request->schoollogo;
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/school_logos', $filename);
        $items->schoollogo = $filename;
      
      }
      $items->save();
      return response()->json(['success' => 'Item added successfully.']);
    
    }


    public function get_data(){
            
            $schools = DB::table('schoolmodels')
            ->join('cities', 'schoolmodels.city', '=', 'cities.city_id')
            ->join('provinces', 'schoolmodels.province', '=', 'provinces.province_id')
            ->select(
              'schoolmodels.id', 
                'schoolmodels.schoolname', 
                'schoolmodels.address', 
                'schoolmodels.contactnumber', 
                'schoolmodels.block', 
                'schoolmodels.ownername', 
                'schoolmodels.schoollogo', 
                'cities.city as city_name', 
                'provinces.province as province_name'
            )
            ->get();


              return response()->json($schools);
    }


    public function singleschool(){
      return view('school/singleschool');
    }

    public function addstudent(){
      return view("student_managment/addstudent");
    }

    public function add_student_db(Request $request) {
      if ($request->hasAny(['student_name', 'class', 'section', 'fathername', 'fathercnic', 'mobilenumber','active'])) {
          $data = new addstudent();
          $data->student_name = $request->student_name;
          $data->class = $request->class;
          $data->section = $request->section;
          $data->father_name = $request->fathername;
          $data->fathercnic = $request->fathercnic;
          $data->mobile_number = $request->mobilenumber;
          $data->status  = $request->active;
          $randomSid = $this->generateRandomSid();
          $data->sid = $randomSid;
          $data->fee_id_ = $request->fee_id_;
          $data->save();
          return response()->json(['success' => 'Item added successfully.']);
      }
  }
  
  protected function generateRandomSid()
  {

      return mt_rand(1000, 9999);
  }

    public function active_student_list(Request $request){
      $active_student = addstudent::where('status', 'active')->get(); 

      if ($request->ajax()) {
          return response()->json(['data' => $active_student]);
      } else {
          return view("student_managment.active_student_list", ['addstudent' => $active_student]);
      }
  }

public function edit_student($id){
  
    $student = addstudent::find($id);

        return response()->json($student);
    }

    public function edit_active_student(Request $request){
      $student_edit = addstudent::find($request->id);
      $student_edit->update([
        'student_name' => $request->input('student_name'),
        'class' => $request->input('class'),
        'section' => $request->input('section'),
        'father_name' => $request->input('father_name'),
        'mobile_number' => $request->input('mobile_number'),
        'status' => $request->input('status'),
      ]);
  
      return redirect('http://127.0.0.1:8000/student_managment/active_student_list');

    }
    public function inactive_student($id){
      
      $student = addstudent::find($id);

      return response()->json($student);
    }

    public function inactive_student_(Request $request)
      {

          $student = addstudent::find($request->id);

          if ($student) {

              $student->delete();

              inactivestudent::create([
                  'id' => $student->id,
                  'student_name'=>$student->student_name,
                  'class'=>$student->class,
                  'section'=>$student->section,
                  'sid'=>$student->sid,
                  'father_name'=>$student->father_name,
                  'fathercnic'=>$student->fathercnic,
                  'mobile_number'=>$student->mobile_number,
                  'status'=>'inactive'
              ]);
      
              return redirect()->back()->with('success', 'Student deleted and moved to inactive.');
          } else {
              return redirect()->back()->with('error', 'Student not found.');
          }

            
      }


      public function inactive_student_list(){
        //scope 
        $inactiveStudents = inactivestudent::inactive()->get();

        // Pass the data to the view
        return view('student_managment.inactive_student_list', ['inactiveStudents' => $inactiveStudents]);
      }
  
}
