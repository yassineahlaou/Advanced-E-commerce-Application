<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Carbon\Carbon;

class ShippingController extends Controller
{
    public function ManageDivision(){
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        return view ('backend.division.divisions_view', compact('divisions'));
    }

    public function DivisionAdd(Request $request){
        $request->validate([
            'division_name' => 'required',
            
            
        ]);
           

        ShippingDivision::insert([
                'division_name' => $request->division_name,
               
                'created_at' => Carbon::now(),

            ]

            );
            $notification = array(
                'message' => 'Division Added Successfully !',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        


        
    }
    public function DivisionEdit($id){
       
        $divisionData = ShippingDivision::findOrFail($id);
        return view ('backend.division.division_edit', compact('divisionData'));

    }

    public function DivisionStore(Request $request){
        $id= $request->id;
        $divisionData = ShippingDivision::find($id);
        $divisionData->division_name = $request->division_name;
        
       
      
        ShippingDivision::findOrFail($id)->update([
                'division_name' => $request->division_name,
                
                'updated_at' => Carbon::now(),
                
                
    
            ]
    
            );
            $notification = array(
                'message' => 'Division Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('manage.division')->with($notification);

        

       


    }

    public function DivisionDelete($id){
        $divisionData = ShippingDivision::findOrFail($id);
       
        $districtData = ShippingDistrict::where('division_id', $id)->get();
        $states = ShippingState::where('division_id', $id)->get();

        foreach ($states as $dataState)
    
        
                ShippingState::findOrFail($dataState->id)->delete();

        foreach ($districtData as $data)
    
        
                ShippingDistrict::findOrFail($data->id)->delete();

        
        ShippingDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ManageDistrict(){
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::latest()->get(); //get all data
        return view ('backend.district.district_view', compact('divisions', 'districts'));
       
    }

    public function DistrictAdd(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
           
            
        ]);
       // $idCategory = Category::findOrFail($request->category_id)->id();

        
       
       ShippingDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
            
           

        ]

        );
        $notification = array(
            'message' => 'District Added Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function DistrictEdit($id){
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $districtData = ShippingDistrict::findOrFail($id);
        $selectedDivision = ShippingDivision::findOrFail($districtData->division_id);
        return view ('backend.district.district_edit', compact('divisions', 'districtData','selectedDivision'));
    }
    public function DistrictStore(Request $request){
        $id= $request->id;
       
        ShippingDistrict::findOrFail($id)->update([
                'division_id' => $request->division_id,
                
               'district_name' => $request->district_name,
               'updated_at' => Carbon::now(),
              
            ]
    
            );
           // dd($subcategoryData->category_id);
            $notification = array(
                'message' => 'District Updated Successfully !',
                'alert-type' => 'success'
            );
            
    
            return redirect()->route('manage.district')->with($notification);
           

        

       


    
    }

    public function DistrictDelete($id){
        $districtData = ShippingDistrict::findOrFail($id);
        $states = ShippingState::where('district_id', $id)->get();//when we use get we return a collection so we need to iterate over it to get props
      foreach ($states as $item)
    
              
             ShippingState::findOrFail($item->id)->delete();
        
        
                

        
    ShippingDistrict::findOrFail($id)->delete();
       


        $notification = array(
            'message' => 'District Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.district')->with($notification);



    }

    public function ManageState(){
        $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
        $districts = ShippingDistrict::latest()->get(); //get all data
        $states = ShippingState::latest()->get(); ;
       
        return view ('backend.state.state_view', compact('divisions', 'districts', 'states'));

    }

    public function GetDistrictAdd($division_id){
        $districts = ShippingDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($districts);
    }

    public function StateAdd(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
           
            
        ]);
       // $idCategory = Category::findOrFail($request->category_id)->id();

        
       
       ShippingState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
            
           

        ]

        );
        $notification = array(
            'message' => 'State Added Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    public function StateEdit($id){
        $divisions = ShippingDivision::orderBy('division_name', 'ASC')->get();
        $state = ShippingState::findOrFail($id);
        $districts = ShippingDistrict::where('division_id', $state->division_id)->orderBy('district_name', 'ASC')->get();
       
        return view ('backend.state.state_edit', compact('state', 'divisions', 'districts'));
    }

    public function StateStore(Request $request){
        $id= $request->id;
       
       
          


        ShippingState::findOrFail($id)->update([
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                

                
                'state_name' => $request->state_name,
                'updated_at' => Carbon::now(),
               
                
                
                
    
            ]
    
            );
           // dd($subcategoryData->category_id);
            $notification = array(
                'message' => 'State Updated Successfully !',
                'alert-type' => 'success'
            );
            
    
            return redirect()->route('manage.state')->with($notification);
           

        

       


    
    }

    public function StateDelete($id){
        $state = ShippingState::findOrFail($id);
       
        
        ShippingState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }

}
