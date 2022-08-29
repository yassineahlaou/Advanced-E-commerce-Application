<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class CategoriesController extends Controller
{
    public function CategoryView(){
        $categoryData = Category::latest()->get(); //get all data
        return view ('backend.categories.category_view', compact('categoryData'));

    }
    public function CategoryAdd(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_fr' => 'required',
            'category_icon' => 'required',
        ]);

        
       
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_fr' => $request->category_name_fr,
            'category_slug_en' => strtolower(str_replace(' ', '_',$request->category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
            'category_slug_fr' => strtolower(str_replace(' ', '_',$request->category_name_fr)),
            'category_icon' => $request->category_icon,

        ]

        );
        $notification = array(
            'message' => 'Category Added Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }

    public function CategorydEdit($id){
        $categoryData = Category::findOrFail($id);
        return view ('backend.categories.category_edit', compact('categoryData'));

    }
    public function CategoryStore(Request $request){
        $id= $request->id;
        $categoryData = Category::find($id);
        $categoryData->category_name_en = $request->category_name_en;
        $categoryData->category_name_fr = $request->category_name_fr;
        $categoryData->category_icon = $request->category_icon;



        Category::findOrFail($id)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_fr' => $request->category_name_fr,
                'category_slug_en' => strtolower(str_replace(' ', '_',$request->category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'category_slug_fr' => strtolower(str_replace(' ', '_',$request->category_name_fr)),
                'category_icon' => $request->category_icon,
                
                
    
            ]
    
            );
            $notification = array(
                'message' => 'Category Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.Categories')->with($notification);

        

       


    }

    public function CategoryDelete($id){
        $categoryData = Category::findOrFail($id);
        $subcategoryData = SubCategory::where('category_id', $id)->get();//when we use get we return a collection so we need to iterate over it to get props
        $subsubcategoryData = SubSubCategory::where('category_id', $id)->get();//when we use get we return a collection so we need to iterate over it to get props
        foreach ($subsubcategoryData as $subsub)
    
        //dd($item->id);
                SubSubCategory::findOrFail($subsub->id)->delete();
       
       
        foreach ($subcategoryData as $sub)
    
               //dd($item->id);
               SubCategory::findOrFail($sub->id)->delete();
       
        
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }
}
