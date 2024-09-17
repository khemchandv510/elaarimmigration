<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CustomAdd;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Faq;
use App\Models\PageContent;
use App\Models\Keyword;
use App\Models\Page;
use App\Models\Blog;
use App\Models\HomepageCard;
use App\Models\News;
use App\Models\Banner;

class ApiController extends Controller
{
    public function categories(Request $request){
        $Category = Category::get();
       
        $Category->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });


        return response()->json(['status' => true, 'message' => 'all master categories','data' => $Category]);
    }

    public function subCategory(Request $request){
        $subSubCategories = SubCategory::get();
        $subSubCategories->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });
        return response()->json(['status' => true, 'message' => 'all sub categories','data' => $subSubCategories]);
    }

    
    public function subSubCategory(Request $request){
        $subSubCategories = SubSubCategory::get();
        $subSubCategories->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });
        return response()->json(['status' => true, 'message' => 'all sub sub categories','data' => $subSubCategories]);
    }

    public function allProducts(Request $request){
        $product = Product::get();
        foreach($product as $data){
            $data->faqs = Faq::where('product_id', $data->id)->get();
            $data->PageContent = PageContent::where('product_id', $data->id)->get();
            $data->Keyword =Keyword::where('product_id', $data->id)->get();
            $data->customAdds =CustomAdd::where('product_id', $data->id)->get();

        }
        return response()->json(['status' => true, 'message' => 'all products','data' => $product]);
    }

    public function ProductDetails(Request $request, $id){
        $product = Product::where('id', $id)->first();
       
            $product->faqs = Faq::where('product_id', $product->id)->get();
            $product->PageContent = PageContent::where('product_id', $product->id)->get();
            $product->Keyword =Keyword::where('product_id', $product->id)->get();
            $product->customAdds =CustomAdd::where('product_id', $product->id)->get();

        
        return response()->json(['status' => true, 'message' => 'all products','data' => $product]);
    }
        
    public function subCategories(Request $request, $id){
        $subSubCategories = SubCategory::where('category_id', $id)->get();
        $subSubCategories->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });
        return response()->json(['status' => true, 'message' => 'sub categories','data' => $subSubCategories]);
    }
    public function subSubCategories(Request $request, $id){
        $subSubCategories = SubSubCategory::where('sub_category_id', $id)->get();
        $subSubCategories->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });
        return response()->json(['status' => true, 'message' => 'sub sub  categories','data' => $subSubCategories]);
    }
    
    
    public function allBlogs(){
        $product = Blog::all();
        
         $product->map(function ($item) {
            $item->category_id = $item->mainCategory->name;
            $item->sub_category = @$item->SubCategories->name;
            $item->sub_sub_category = @$item->subSubCategories->name;
            return $item;
        });
       
         
        return response()->json(['status' => true, 'message' => 'all blogs','data' => $product]);
    }

    

    public function BlogDetails($id){
        $product = Blog::find($id);
        if(empty($product)){
            return response()->json(['status' => false, 'message' => 'Not found blogs','data' => null], 200);
        }
        //  $product->map(function ($item) {
            $product->category_id = $product->mainCategory->name;
            $product->sub_category = @$product->SubCategories->name;
            $product->sub_sub_category = @$product->subSubCategories->name;
            // return $item;
        // });
       
         
        return response()->json(['status' => true, 'message' => 'all blogs','data' => $product]);
    }

    public function allNews(){
        $product = News::all();
        
         $product->map(function ($item) {
            $item->category_id = $item->mainCategory->name;
            return $item;
        });
       
         
        return response()->json(['status' => true, 'message' => 'all news','data' => $product], 200);
    }

    
    public function NewsDetails($id){
        $product = News::find($id);
        if(empty($product)){
            return response()->json(['status' => false, 'message' => 'Not foune news','data' => null], 200);
        }
        $product->category_id = $product->mainCategory->name;         
        return response()->json(['status' => true, 'message' => 'all news','data' => $product], 200);
    }
    
    
    public function allPages(){
        $Page = Page::all();
        return response()->json(['status' => true, 'message' => 'all pages','data' => $Page], 200);

    }

    public function pageDetails($id){

        $product = Page::find($id);
        $product->faqs = Faq::where('page_id', $id)->get();
        $product->PageContent = PageContent::where('page_id', $id)->get();
        $product->Keyword =Keyword::where('page_id', $id)->get();
        $product->customAdds =CustomAdd::where('page_id', $id)->get();
        $product->Banners =Banner::where('page_id', $id)->get();

        return response()->json(['status' => true, 'message' => 'product details','data' => $product]);

    }

    public function  HomePageCard(){
        $homepageCard = HomepageCard::all();
        return response()->json(['status' => true, 'message' => 'Home page card','data' => $homepageCard]);

    }

    public function  HomePageCardDetails($id){
        $homepageCard = HomepageCard::find($id);
        return response()->json(['status' => true, 'message' => 'Home page card','data' => $homepageCard]);

    }
    
   
    
}
