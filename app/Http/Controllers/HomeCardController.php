<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\HomepageCard;
use App\Models\Faq;
use App\Models\PageContent;
use App\Models\Keyword;
use App\Models\CustomAdd;
use App\Models\Page;
use App\Models\Banner;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\returnSelf;

class HomeCardController extends Controller
{
    
    public function index(Request $request){
        $cards = HomepageCard::get();
        // dd($cards);
        return view('cards.index', compact('cards'));
    }
    
    public function add(Request $request){
        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();
        return view('cards.create', compact('category'));
    }
    
     
    public function edit($id){
        $home =  HomepageCard::find($id);
        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();

        return view('cards.edit', compact('home', 'category'));
    }
    
    
    public function store(Request $request){
        
        
        
        HomepageCard::create([
            'category_id' => $request->category,
            'add_link' => $request->add_link,
            'first_title' => $request->first_title,
            'second_title' => $request->second_title,
            'content' => $request->description,
            'custom_name1' => $request->custom_name1,
            'url1' => $request->url1,
            'custom_name2' => $request->custom_name2,
            'url2' => $request->url2,
            
            'custom_name3' => $request->custom_name3,
            'url3' => $request->url3,
            'custom_name4' => $request->custom_name4,
            'url4' => $request->url4,
            
            
            ]);
            
                    return redirect()->route('card.index');

        // return view('cards.create', compact('category'));
    }
    
    public function update(Request $request, $id){
        
        HomepageCard::where('id', $id)->update([
            'category_id' => $request->category,
            'add_link' => $request->add_link,
            'first_title' => $request->first_title,
            'second_title' => $request->second_title,
            'content' => $request->description,
            'custom_name1' => $request->custom_name1,
            'url1' => $request->url1,
            'custom_name2' => $request->custom_name2,
            'url2' => $request->url2,
            
            'custom_name3' => $request->custom_name3,
            'url3' => $request->url3,
            'custom_name4' => $request->custom_name4,
            'url4' => $request->url4,
            
            
            ]);
            
            return redirect()->route('card.index');

        // return view('cards.create', compact('category'));
    }


    public function delete(Request $request, $id){
        HomepageCard::where('id', $id)->delete();
        return back();
    }


    public function homePage(Request $request){
        $Homepage = Page::where('id', 1)->first();
        // dd($page);
        $faqs = Faq::where('page_id', $Homepage->id)->get();
        $pageContent = PageContent::where('page_id', $Homepage->id)->get();
        $keyword = Keyword::where('page_id', $Homepage->id)->get();

        $CustomAdd = CustomAdd::where('page_id', $Homepage->id)->get();
        $banners = Banner::where('page_id', $Homepage->id)->get();

        // dd($page);
        return view('home-page', compact('Homepage', 'faqs', 'pageContent', 'keyword', 'CustomAdd', 'banners'));

    }


    public function updateHomePage(Request $request){

        $Homepage = Page::where('id', $request->page_id )->first();
        $faqs = Faq::where('page_id', $Homepage->id)->get();
        $pageContent = PageContent::where('page_id', $Homepage->id)->get();
        $keyword = Keyword::where('page_id', $Homepage->id)->get();

        $CustomAdd = CustomAdd::where('page_id', $Homepage->id)->get();
        // dd($Homepage);
         
        $destopImage  = $Homepage->banner1;
        if($request->hasFile('destopImage')){
            $destopImage = time().'.'.$request->destopImage->getClientOriginalExtension();
            $request->destopImage->move(public_path('images'), $destopImage);

        }
        $mobileImage  = $Homepage->banner2;
        if($request->hasFile('mobileIMage')){
            $mobileImage = time().'.'.$request->mobileIMage->getClientOriginalExtension();
            $request->mobileIMage->move(public_path('images'), $mobileImage);

        }

        Page::where('id', $request->page_id)->update([
            'page_name' => $request->pageName,
            'banner_title' => $request->bannerTitle,
            'banner_url' => $request->bannerUrl,
            'description' => $request->description,
            'faq_title' => $request->faqtitle,
            'keyword_title' => $request->customKeyword,
            'meta_tag' => $request->metatag,
            'meta_desc' => $request->metadescription,
            'meta_keywords' => $request->metakeywords,
            'seo_url' => $request->seourl,

            'head_tag' => $request->scripthead,
            'body_tag' => $request->scriptBody,
            'footer_desc' => $request->footerdescription,
            'banner1' => $destopImage,
            'banner2' => $mobileImage

        ]);

        return back();

    }

    public function pages(){
        $home = Page::all();
        return view('home.index', compact('home'));
    }

    public function CreatePage (){
        return view('home.create');
    }

    public function CreatePageDynamic(Request $request){

        $destopImage  = null;
        if($request->hasFile('destopImage')){
            $destopImage = time().'.'.$request->destopImage->getClientOriginalExtension();
            $request->destopImage->move(public_path('images'), $destopImage);

        }
        $mobileImage  = null;
        if($request->hasFile('mobileIMage')){
            $mobileImage = time().'.'.$request->mobileIMage->getClientOriginalExtension();
            $request->mobileIMage->move(public_path('images'), $mobileImage);

        }

       $page = Page::create([
            'page_name' => $request->pageName,
            'banner_title' => $request->bannerTitle,
            'banner_url' => $request->bannerUrl,
            'description' => $request->description,
            'faq_title' => $request->faqtitle,
            'keyword_title' => $request->customKeyword,
            'meta_tag' => $request->metatag,
            'meta_desc' => $request->metadescription,
            'meta_keywords' => $request->metakeywords,
            'seo_url' => $request->seourl,

            'head_tag' => $request->scripthead,
            'body_tag' => $request->scriptBody,
            'footer_desc' => $request->footerdescription,
            'banner1' => $destopImage,
            'banner2' => $mobileImage

        ]);
        
        return redirect()->route(['home.edit', $page->id ]);
        
        
    }

    public function PageEdit($id){
        $Homepage = Page::where('id', $id)->first();
        // dd($page);
        $faqs = Faq::where('page_id', $Homepage->id)->get();
        $pageContent = PageContent::where('page_id', $Homepage->id)->get();
        $keyword = Keyword::where('page_id', $Homepage->id)->get();

        $CustomAdd = CustomAdd::where('page_id', $Homepage->id)->get();
        $banners = Banner::where('page_id', $Homepage->id)->get();

        // dd($page);
        return view('home-page', compact('Homepage', 'faqs', 'pageContent', 'keyword', 'CustomAdd', 'banners'));

    }

    public function  AddBanner(Request $request) {

        $validator = $request->validate([           
            'page_id' => 'required|numeric',
            'destopImage' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
            'mobileIMage' => 'image|mimes:jpeg,png,jpg,webp|max:1024',

        ]);

        $destopImage  = null;
        if($request->hasFile('destopImage')){
            $destopImage = time().'.'.$request->destopImage->getClientOriginalExtension();
            $request->destopImage->move(public_path('images'), $destopImage);

        }

        $mobileImage  = null;
        if($request->hasFile('mobileIMage')){
            $mobileImage = time().'.'.$request->mobileIMage->getClientOriginalExtension();
            $request->mobileIMage->move(public_path('images'), $mobileImage);
        }

        Banner::create([
            'page_id' => $request->page_id,
            'title' => $request->title,
            'url' => $request->bannerUrl,
            'Description' => $request->description,
           
            'destop' => $destopImage,
            'mobile' => $mobileImage

        ]);

        return back();
    }

    public function BannerDetails($id){
        
        $banner = Banner::find($id);
        return response()->json(['status' => true, 'data' => $banner]); 

    }

    
    public function DeleteBanner($id){
        
        $banner = Banner::find($id)->delete();
        return back();

    }

    public Function BannerUpdate(Request  $request){
        $validator = $request->validate([           
            'banner_id' => 'required|numeric',
            'destopImage' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
            'mobileIMage' => 'image|mimes:jpeg,png,jpg,webp|max:1024',

        ]);

        $banner = Banner::find($request->banner_id);

        $destopImage  = $banner->destop;
        if($request->hasFile('destopImage')){
            $destopImage = time().'.'.$request->destopImage->getClientOriginalExtension();
            $request->destopImage->move(public_path('images'), $destopImage);

        }

        $mobileImage  = $banner->mobile;
        if($request->hasFile('mobileIMage')){
            $mobileImage = time().'.'.$request->mobileIMage->getClientOriginalExtension();
            $request->mobileIMage->move(public_path('images'), $mobileImage);
        }

        Banner::where('id', $request->banner_id)->update([
            // 'page_id' => $request->page_id,
            'title' => $request->title,
            'url' => $request->bannerUrl,
            'Description' => $request->description,
           
            'destop' => $destopImage,
            'mobile' => $mobileImage

        ]);

        return back();
    }
}

    