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
use App\Models\Pagecard;
use App\Models\Socialmedia;
// use GuzzleHttp\Client;
use App\Models\Client;


class ApiController extends Controller
{
    public function categories(Request $request){
        $Category = Category::orderby('position', 'asc')->get();
       
        $Category->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });


        return response()->json(['status' => true, 'message' => 'all master categories','data' => $Category]);
    }

    public function subCategory(Request $request){
        $subSubCategories = SubCategory::orderby('position', 'asc')->get();
        $subSubCategories->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });
        return response()->json(['status' => true, 'message' => 'all sub categories','data' => $subSubCategories]);
    }

    
    public function subSubCategory(Request $request){
        $subSubCategories = SubSubCategory::orderby('position', 'asc')->get();
        $subSubCategories->map(function ($item) {
            $item->navi = $item->navi == 1 ? true : false;
            return $item;
        });
        return response()->json(['status' => true, 'message' => 'all sub sub categories','data' => $subSubCategories]);
    }

    public function allProducts(Request $request){
        $product = Product::get();
        foreach($product as $data){
            if($data->inquiry == 0){
                $data->inquiry = false; 
            }else{
                $data->inquiry = true;
            }
            if($data->navigation == 0){
                $data->navigation = false; 
            }else{
                $data->navigation = true;
            }
            if($data->topices == 0){
                $data->topices = false; 
            }else{
                $data->topices = true;
            }

            $data->faqs = Faq::where('product_id', $data->id)->get();
            $data->PageContent = PageContent::where('product_id', $data->id)->get();
            $data->Keyword =Keyword::where('product_id', $data->id)->get();
            $data->customAdds =CustomAdd::where('product_id', $data->id)->get();
            $data->pageCard = Pagecard::where('product_id', $data->id)->get();

        }
        return response()->json(['status' => true, 'message' => 'all products','data' => $product]);
    }

    public function ProductDetails(Request $request, $id){
        $product = Product::where('seo_url', $id)->first();
        if($product->inquiry == 0){
            $product->inquiry = false; 
        }else{
            $product->inquiry = true;
        }
        if($product->navigation == 0){
            $product->navigation = false; 
        }else{
            $product->navigation = true;
        }
        if($product->topices == 0){
            $product->topices = false; 
        }else{
            $product->topices = true;
        }

        if($product->news == 0){
            $product->news = false; 
        }else{
            $product->news = true;
        }

        $product->category_name = @$product->mainCategory->name;
        $product->category_image = @$product->mainCategory->image;
       
            $product->faqs = Faq::where('product_id', $product->id)->get();
            $product->PageContent = PageContent::where('product_id', $product->id)->get();
            $product->Keyword =Keyword::where('product_id', $product->id)->get();
            $product->customAdds =CustomAdd::where('product_id', $product->id)->get();
            $product->pageCard = Pagecard::where('product_id', $product->id)->get();


        
        return response()->json(['status' => true, 'message' => 'all products','data' => $product]);
    }
        
    public function subCategories(Request $request, $id){
        $subSubCategories = SubCategory::where('category_id', $id)->orderby('position', 'asc')->get();
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
            // dd( $item->category_id);
            // $names  = json_decode( $item->category_id);
            // dd($names);
            $category_id = Category::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();
            $subCategory = subCategory::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();

            $subSubCategory = subSubCategory::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();


            $allItems = new \Illuminate\Database\Eloquent\Collection; 
            $allItems = $allItems->concat($category_id);
            $allItems = $allItems->concat($subCategory);
            $allItems = $allItems->concat($subSubCategory);

            $item->categories = $allItems;

            $item->custom_ads = PageContent::where('news_id', $item->id)->get();

            $item->pageContent = PageContent::where('news_id', $item->id)->get();
            $item->author = @$item->authorname->auther_name;
    
            return $item;
        });   
         
        return response()->json(['status' => true, 'message' => 'all news','data' => $product], 200);
    }

    public function NewsCategorywise($category){
        $product = News::whereJsonContains('category_id', $category )->get();

         $product->map(function ($item) {

            $item->custom_ads = PageContent::where('news_id', $item->id)->get();

            $item->pageContent = PageContent::where('news_id', $item->id)->get();
            $item->author = @$item->authorname->auther_name;

            $category_id = Category::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();
            $subCategory = subCategory::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();

            $subSubCategory = subSubCategory::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();
            
            $allItems = new \Illuminate\Database\Eloquent\Collection; 
            $allItems = $allItems->concat($category_id);
            $allItems = $allItems->concat($subCategory);
            $allItems = $allItems->concat($subSubCategory);

            $item->categories = $allItems;

            return $item;
        });   


         
        return response()->json(['status' => true, 'message' => 'all news','data' => $product], 200);
    }

    
    public function NewsDetails($id){

        // dd($id);
        $product = News::where('seourl', $id)->first();
        if(empty($product)){
            return response()->json(['status' => false, 'message' => 'Not foune news','data' => null], 200);
        }


            $product->custom_ads = PageContent::where('news_id', $product->id)->get();

            $product->pageContent = PageContent::where('news_id', $product->id)->get();
            $product->author = @$product->authorname->auther_name;
          
            $category_id = Category::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();
            $subCategory = subCategory::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();

            $subSubCategory = subSubCategory::wherein('name',["Work","Prince Edward Island Provincial Nominee Program"])->get();
            
            $allItems = new \Illuminate\Database\Eloquent\Collection; 
            $allItems = $allItems->concat($category_id);
            $allItems = $allItems->concat($subCategory);
            $allItems = $allItems->concat($subSubCategory);

            $product->categories = $allItems;

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

        $homepageCard->map(function ($item) {
            $item->category_id = $item->mainCategory->name;
            $item->category_image = $item->mainCategory->image;

            return $item;
        });

        return response()->json(['status' => true, 'message' => 'Home page card','data' => $homepageCard]);

    }

    public function  HomePageCardDetails($id){
        $homepageCard = HomepageCard::find($id);
        return response()->json(['status' => true, 'message' => 'Home page card','data' => $homepageCard]);

    }

    public function Socialmedia(){
        $Socialmedia = Socialmedia::find(1);
        return response()->json(['status' => true, 'message' => 'social media','data' => $Socialmedia]);

    }

    public function allClients(){
        $Socialmedia = Client::all();
        return response()->json(['status' => true, 'message' => 'all cients','data' => $Socialmedia]);
    }

    public function ClientDetails($id){
        $Socialmedia = Client::find($id);
        return response()->json(['status' => true, 'message' => 'all cients','data' => $Socialmedia]);
    }
    
    
    
}
