<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderby('id', 'desc')->get();
        if($request->method()=='GET')
        {
            return view('create-category', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required|unique:categories|string',
                'navi'      => 'required|numeric',
                // 'parent_id' => 'nullable|numeric',
                'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
            ]);


            if($request->file('image')){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }

            Category::create([
                'name' => $request->name,
                'slug' =>  Str::random(9),
                // 'parent_id' => $request->parent_id,
                'navi' => $request->navi,
                'image' => isset($imageName) ? $imageName : null,
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }

    
    public function viewCategory(Request $request, $catId)
    {
        $categories = Category::where('id', $catId)->first();
        if(empty($categories)){
            return back();
        }
        $subCategories = Category::where('parent_id', $catId)->orderby('id', 'asc')->get();
               
        return view('detail-category', compact('categories', 'subCategories'));
        
    }

    public function updateCategory(Request $request, $catId){
        $validator = $request->validate([
            'name'      => 'required|string',
            'navi'      => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);

        $catIdCheck = Category::where('id', $catId)->first();
        if(empty($catIdCheck)){
            return redirect()->back()->with('danger', 'Category has wrong.');
        }

        if($request->file('image')){

            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }

        Category::where('id', $catId)->update([
            'name' => $request->name,
            'navi' => $request->navi,
            'image' => isset($imageName) ? $imageName : $catIdCheck->image,
        ]);

        return redirect()->back()->with('success', 'Category has been updated successfully.');
    }


    public function subCategory(Request $request){
        $categories = Category::where('parent_id', null)->orderby('id', 'desc')->get();
        $subCategories = SubCategory::get();
        return view('category.subcategory', compact('subCategories', 'categories'));
    }

    public function createSubCategory(Request $request){
       
        $validator = $request->validate([
            'name'      => 'required|unique:sub_categories|string',
            'navi'      => 'required|numeric',
            'parent_id' => 'required|nullable|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);


        if($request->file('image')){

            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }

        subCategory::create([
            'name' => $request->name,
            'category_id' => $request->parent_id,
            'navi' => $request->navi,
            'image' => isset($imageName) ? $imageName : null,
        ]);

        return redirect()->back()->with('success', 'Category has been created successfully.');
    }
    

    public function subSubCategory(Request $request){
        $categories = Category::where('parent_id', null)->orderby('id', 'desc')->get();
        $subSubCategories = SubSubCategory::get();
        return view('category.subsubcategory', compact('subSubCategories', 'categories'));
    }

    public function getSubCategory(Request $request, $id){
        $subSubCategories = subCategory::where('category_id', $id)->get();
        return response()->json(['status' => true, 'data' => $subSubCategories]);
    }

    public function createsubsubCategory(Request $request){
        $validator = $request->validate([
            'name'      => 'required|unique:sub_sub_categories|string',
            'navi'      => 'required|numeric',
            'parent_id' => 'required|nullable|numeric',
            'subcategory' => 'required|nullable|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);


        if($request->file('image')){

            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }

        // dd($request);
        subSubCategory::create([
            'name' => $request->name,
            'category_id' => $request->parent_id,
            'sub_category_id' => $request->subcategory,
            'navi' => $request->navi,
            'image' => isset($imageName) ? $imageName : null,
        ]);

        return redirect()->back()->with('success', 'Category has been created successfully.');
    }
    
    public function  deleteCategory(Request $request, $id){
        // dd($id);
        Category::where('id' , $id)->delete();
        
        return redirect()->back()->with('success', 'Category has been deleted successfully.');
    }
    
    public function  deleteSubCategory(Request $request, $id){
        SubCategory::where('id' , $id)->delete();
        
        return redirect()->back()->with('success', 'Category has been deleted successfully.');
    }
    
    
    public function  deleteSubSubCategory(Request $request, $id){
        SubSubCategory::where('id' , $id)->delete();
        
        return redirect()->back()->with('success', 'Category has been deleted successfully.');
    }

    public Function subCategoryDetails($id){

        $categories = Category::where('parent_id', null)->orderby('id', 'desc')->get();
        $subCategories = SubCategory::find($id);
        return view('category.Editsubcategory', compact('subCategories', 'categories'));

    }

    
    public Function subCategoryUpdate(Request $request, $id){

        // $categories = Category::where('parent_id', null)->orderby('id', 'desc')->get();
        $subCategories = SubCategory::find($id);
        $imageName = $subCategories->image;
        if($request->hasfile('image')){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }
        subCategory::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->parent_id,
            'navi' => $request->navi,
            'image' => $imageName ,
        ]);
        return back();        

    }

    public function SubSubcategoryDetails($id){

        $categories = Category::where('parent_id', null)->orderby('id', 'desc')->get();
        $subSubCategories = SubSubCategory::find($id);
        $subcategories = SubCategory::where('category_id', $subSubCategories->category_id)->orderby('id', 'desc')->get();
        // dd($subSubCategories);

        return view('category.subsubcategoryDetail', compact('subSubCategories', 'categories', 'subcategories'));

    }

    public function SubSubcategoryUpdate(Request $request, $id ){
        
    $validator = $request->validate([
            'name'      => 'required|string',
            'navi'      => 'required|numeric',
            'parent_id' => 'required|nullable|numeric',
            // 'subcategory' => 'required|nullable|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);


        $imageName = subSubCategory::find($id);
        if($request->file('image')){

            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
        }

        subSubCategory::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->parent_id,
            'sub_category_id' => $request->subcategory,
            'navi' => $request->navi,
            'image' =>  $imageName->image ,
        ]);

        return redirect()->back()->with('success', 'Category has been created successfully.');
    
    
    }
    
}