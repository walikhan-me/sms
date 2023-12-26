<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\schoolmodel;

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
}
