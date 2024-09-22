<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Faq;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\PageContent;
use App\Models\Keyword;
use App\Models\SubSubCategory;
use App\Models\CustomAdd;
use App\Models\Pagecard;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        // return view('posts.index', compact('products'));
        return view('products.index', compact('products'));

    }
    public function Details(Request $request, $id){
        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();
        
        $products = Product::find($id);
        $subCategory =  SubCategory::where('category_id', $products->category_id)->get();
        
        $subSubCategory =  SubSubCategory::where('sub_category_id', $products->sub_category_id)->get();
        
        // dd($subCategory);
        $faqs = Faq::where('product_id', $id)->get();
        $pageContent = PageContent::where('product_id', $id)->get();
        $keyword = Keyword::where('product_id', $id)->get();

        $CustomAdd = CustomAdd::where('product_id', $id)->get();
        
        $pagecardData = Pagecard::where('product_id', $id)->get();

        return view('products.details', compact('products', 'category', 'faqs', 'pageContent', 'keyword', 'CustomAdd', 'subCategory', 'subSubCategory', 'pagecardData' ));
    }


    public function  Delete_product(Request $request, $id){
        Product::find($id)->delete();
        return back();
    }


    public function addProduct(Request $request) {
        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();
        return view('products.add', compact('category'));
    }
    public function saveProduct(Request $request) {
        // dd($request);

        $validator = $request->validate([
            'pageName'      => 'required|string|unique:products,name',
            'category'      => 'required|numeric',
            // 'subcategory' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);

        $products = Product::create([
            'name' => $request->pageName,
            'category_id' => $request->category, 

            'sub_category_id' => $request->subcategory, 

            'child_category_id' => $request->subSubcategory, 
            'metaTag' => $request->metatag, 
            'meta_desc' => $request->metadescription, 
            'meta_tag_key' => $request->metakeywords, 
            'seo_url' => $request->seourl, 
            'dynamic_head' => $request->scripthead,
            'dynamic_body' => $request->scriptBody,
            'footer_desc' => $request->footerdescription, 
            'faq_title' => $request->faqtitle,
            'keyword_title' => $request->customKeyword

        ]);    

        return redirect()->route('product.detail', $products->id)->with('success', 'Product has been created successfully.');
    }

    public function  productUpdate(Request $request, $id){
        $validator = $request->validate([
            'pageName'      => 'required|string',
            'category'      => 'required|numeric',
            // 'subcategory' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);
        // dd($id);
        // dd($request);

        $products = Product::where(['id' => (int)$id])->update([
            'name' => $request->pageName,
            'category_id' => $request->category, 

            'sub_category_id' => $request->subcategory, 

            'child_category_id' => $request->subSubcategory, 
            'metaTag' => $request->metatag, 
            'meta_desc' => $request->metadescription, 
            'meta_tag_key' => $request->metakeywords, 
            'seo_url' => $request->seourl, 
            'dynamic_head' => $request->scripthead,
            'dynamic_body' => $request->scriptBody,
            'footer_desc' => $request->footerdescription, 
            'faq_title' => $request->faqtitle,
             'keyword_title' => $request->customKeyword,
             'PcardTitle' => $request->PcardTitle,
             'pageCardDescription' => $request->pageCardDescription,
             'topices' => $request->topices,
             'navigation' => $request->navigation,
             'inquiry' => $request->inquiry


        ]);    

        return redirect()->route('product.detail', $id)->with('success', 'Product has been created successfully.');
    }
}
