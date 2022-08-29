<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoriesController extends Controller
{
    public function SubCategoryView(){
    $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategoryData = SubCategory::latest()->get(); //get all data
        return view ('backend.sub_categories.sub_category_view', compact('subcategoryData', 'categories'));
    }
    public function SubCategoryAdd(Request $request){
        $request->validate([
            'category_id' => 'required',
            'sub_category_name_en' => 'required',
            'sub_category_name_fr' => 'required',
            
        ]);
       // $idCategory = Category::findOrFail($request->category_id)->id();

        
       
        SubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_name_en' => $request->sub_category_name_en,
            'sub_category_name_fr' => $request->sub_category_name_fr,
            'sub_category_slug_en' => strtolower(str_replace(' ', '_',$request->sub_category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
            'sub_category_slug_fr' => strtolower(str_replace(' ', '_',$request->sub_category_name_fr)),
           

        ]

        );
        $notification = array(
            'message' => 'Sub Category Added Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function SubCategorydEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategoryData = SubCategory::findOrFail($id);
        $selectedcategoy = Category::findOrFail($subcategoryData->category_id);
        return view ('backend.sub_categories.subcategory_edit', compact('subcategoryData', 'categories','selectedcategoy'));
    }
    public function SubCategoryStore(Request $request){
        $id= $request->id;
        /*$subcategoryData = SubCategory::find($id);
        $subcategoryData->category_id = $request->category_id;
        $subcategoryData->sub_category_name_en = $request->sub_category_name_en;
        $subcategoryData->sub_category_name_fr = $request->sub_category_name_fr;*/
       
          


        SubCategory::findOrFail($id)->update([
                'category_id' => $request->category_id,
                

                
                'sub_category_name_en' => $request->sub_category_name_en,
                'sub_category_name_fr' => $request->sub_category_name_fr,
                'sub_category_slug_en' => strtolower(str_replace(' ', '_',$request->sub_category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'sub_category_slug_fr' => strtolower(str_replace(' ', '_',$request->sub_category_name_fr)),
                
                
                
    
            ]
    
            );
           // dd($subcategoryData->category_id);
            $notification = array(
                'message' => 'SubCategory Updated Successfully !',
                'alert-type' => 'success'
            );
            
    
            return redirect()->route('all.SubCategories')->with($notification);
           

        

       


    
    }

    public function SubCategoryDelete($id){
        $subcategoryData = SubCategory::findOrFail($id);
        $subsubcategoryData = SubSubCategory::where('sub_category_id', $id)->get();//when we use get we return a collection so we need to iterate over it to get props
       foreach ($subsubcategoryData as $item)
    
               //dd($item->id);
               SubSubCategory::findOrFail($item->id)->delete();
        
        //dd($subsubcategoryData->id);
                

        
        SubCategory::findOrFail($id)->delete();
       


        $notification = array(
            'message' => 'SubCategory Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('all.SubCategories')->with($notification);



    }
    //sub sub category part

    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('sub_category_name_en', 'ASC')->get();
        $subsubcategoryData = SubSubCategory::latest()->get(); //get all data
        return view ('backend.subsub_categories.subsub_category_view', compact('subsubcategoryData', 'categories', 'subcategories'));

    }
    public function GetSubCategoryAdd($category_id){
        $subcategories = SubCategory::where('category_id', $category_id)->orderBy('sub_category_name_en', 'ASC')->get();
        return json_encode($subcategories);
    }

    public function SubSubCategoryAdd(Request $request){
        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'sub_sub_category_name_en' => 'required',
            'sub_sub_category_name_fr' => 'required',
            
        ]);
       // $idCategory = Category::findOrFail($request->category_id)->id();

        
       
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
            'sub_sub_category_name_fr' => $request->sub_sub_category_name_fr,
            'sub_sub_category_slug_en' => strtolower(str_replace(' ', '_',$request->sub_sub_category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
            'sub_sub_category_slug_fr' => strtolower(str_replace(' ', '_',$request->sub_sub_category_name_fr)),
           

        ]

        );
        $notification = array(
            'message' => 'Sub Sub Category Added Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    public function SubSubCategorydEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        //$subcategories = SubCategory::orderBy('sub_category_name_en', 'ASC')->get();
        $subsubcategoryData = SubSubCategory::findOrFail($id);
        $subcategories = SubCategory::where('category_id', $subsubcategoryData->category_id)->orderBy('sub_category_name_en', 'ASC')->get();
        //$selectedcategoy = Category::findOrFail($subcategoryData->category_id);
        return view ('backend.subsub_categories.subsub_category_edit', compact('subsubcategoryData', 'categories', 'subcategories'));
    }

    public function SubSubCategoryStore(Request $request){
        $id= $request->id;
        /*$subcategoryData = SubCategory::find($id);
        $subcategoryData->category_id = $request->category_id;
        $subcategoryData->sub_category_name_en = $request->sub_category_name_en;
        $subcategoryData->sub_category_name_fr = $request->sub_category_name_fr;*/
       
          


        SubSubCategory::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                

                
                'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
                'sub_sub_category_name_fr' => $request->sub_sub_category_name_fr,
                'sub_sub_category_slug_en' => strtolower(str_replace(' ', '_',$request->sub_sub_category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'sub_sub_category_slug_fr' => strtolower(str_replace(' ', '_',$request->sub_sub_category_name_fr)),
                
                
                
    
            ]
    
            );
           // dd($subcategoryData->category_id);
            $notification = array(
                'message' => 'SubSubCategory Updated Successfully !',
                'alert-type' => 'success'
            );
            
    
            return redirect()->route('all.SubSubCategories')->with($notification);
           

        

       


    
    }

    public function SubSubCategoryDelete($id){
        $subsubcategoryData = SubSubCategory::findOrFail($id);
       
        
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubSubCategory Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }


}
