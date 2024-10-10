<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Client;
use App\Models\Author;
use App\Models\CustomAdd;
use App\Models\PageContent;

class BlogController extends Controller
{
    public function index(Request $request){
        $blogs = Blog::get();
        return view('blogs.index', compact('blogs'));
    }

 

    public function deleteBlog(Request $request, $id){
        $blogs = Blog::find($id)->delete();
        return back();
    }

    public function create(Request $request){
        // dd('test');
        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();

        return view('blogs.create', compact('category'));
    }
    
    
     
    public function editBlog(Request $request, $id){
        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();
        
        $blog = Blog::find($id);
        $subCategory =  SubCategory::where('category_id', $blog->category_id)->get();
        
        $subSubCategory =  SubSubCategory::where('sub_category_id', $blog->sub_category_id)->get();

        return view('blogs.edit', compact('category', 'blog', 'subCategory', 'subSubCategory' ));
    }
    
    public function updateBlog(Request $request, $id){
        
        // dd($request);
        
        $validator = $request->validate([
            'pageName'      => 'required',
            'category'      => 'required|numeric',
            'blog_id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);



         $blog = Blog::find($id);
        //  dd($blog); 
        
          $imageName  = $blog->image;
            if($request->file('image')){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }
            
            
        Blog::where(['id' => $id ])->update(['title' => $request->pageName, 'category_id' => $request->category, 'sub_category_id' => $request->subcategory, 'sub_sub_category' => $request->subSubcategory, 'auther_name' => $request->authorName, 'slug' => $request->slug, 'content' => $request->footerdescription, 'image' => $imageName, 'metatag' => $request->metatag, 'metadescription' => $request->metadescription, 'metakeywords' => $request->metakeywords, 'seourl' => $request->seourl, 'scripthead' => $request->scripthead, 'scriptBody' => $request->scriptBody ]);
        
        
        return back();
        
        
    }

    
    
    public function storeBlog(Request $request){

        $validator = $request->validate([
            'pageName'      => 'required',
            'category'      => 'required|numeric',
            // 'subcategory' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);

            $imageName  = null;
            if($request->file('image')){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }
            
        Blog::create(['title' => $request->pageName, 'category_id' => $request->category, 'sub_category_id' => $request->subcategory, 'sub_sub_category' => $request->subSubcategory, 'auther_name' => $request->authorName, 'slug' => $request->slug, 'content' => $request->footerdescription, 'image' => $imageName, 'metatag' => $request->metatag, 'metadescription' => $request->metadescription, 'metakeywords' => $request->metakeywords, 'seourl' => $request->seourl, 'scripthead' => $request->scripthead, 'scriptBody' => $request->scriptBody ]);
        
        
        return redirect()->route('blog.index');
 
        
    }
    
    
    // news section
    
    public function indexNews(Request $request){
        $blogs = News::get();
        return view('news.index', compact('blogs'));
    }


    public function createNews(Request $request){

        $author = Author::all();
        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();
        $subCategory =  SubCategory::get();
        $subSubCategory =  SubSubCategory::get();

        $allItems = new \Illuminate\Database\Eloquent\Collection; 
        $allItems = $allItems->concat($category);
        $allItems = $allItems->concat($subCategory);
        $allItems = $allItems->concat($subSubCategory);

      
        return view('news.create', compact('allItems', 'author'));
    }
    
    public function storeNews(Request $request){
        $validator = $request->validate([
            'pageName'      => 'required',
            // 'category'      => 'required',
            // 'subcategory' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);


        // dd($request);
            $imageName  = null;
            if($request->file('image')){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }
            
        News::create(['title' => $request->pageName, 'category_id' => json_encode($request->category), 'sub_category_id' => $request->subcategory, 'sub_sub_category' => $request->subSubcategory, 'auther_name' => $request->authorName, 'slug' => $request->slug, 'content' => $request->footerdescription, 'image' => $imageName, 'metatag' => $request->metatag, 'metadescription' => $request->metadescription, 'metakeywords' => $request->metakeywords, 'seourl' => $request->seourl, 'scripthead' => $request->scripthead, 'scriptBody' => $request->scriptBody, 'publish_date' => $request->date ]);
        
        
        return redirect()->route('news.index');
    }
    
     
    
    public function editNews(Request $request, $id){
        
        $blog = News::find($id);

        $category =  Category::where('parent_id', null)->orderby('id', 'desc')->get();
        $subCategory =  SubCategory::get();
        $subSubCategory =  SubSubCategory::get();

        $allItems = new \Illuminate\Database\Eloquent\Collection; 
        $allItems = $allItems->concat($category);
        $allItems = $allItems->concat($subCategory);
        $allItems = $allItems->concat($subSubCategory);

        $pageContent = PageContent::where('news_id', $id)->get();
        $CustomAdd= CustomAdd::where('news_id', $id)->get();
        return view('news.edit', compact('category', 'blog', 'allItems', 'pageContent', 'CustomAdd' ));
    }
    
     
    public function updateNews(Request $request, $id){
        
        
        $validator = $request->validate([
            'pageName'      => 'required',
            'category'      => 'required',
            'blog_id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);



         $blog = News::find($id);
        //  dd($blog); 
        
          $imageName  = $blog->image;
            if($request->file('image')){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }
            
            
        News::where(['id' => $id ])->update(['title' => $request->pageName, 'category_id' => $request->category, 'sub_category_id' => $request->subcategory, 'sub_sub_category' => $request->subSubcategory, 'auther_name' => $request->authorName, 'slug' => $request->slug, 'content' => $request->footerdescription, 'image' => $imageName , 'metatag' => $request->metatag, 'metadescription' => $request->metadescription, 'metakeywords' => $request->metakeywords, 'seourl' => $request->seourl, 'scripthead' => $request->scripthead, 'scriptBody' => $request->scriptBody , 'publish_date' => $request->date]);
        
        
        return back();
        
    }
    
     
    public function deleteNews(Request $request, $id){
        $blogs = News::find($id)->delete();
        return back();
    }
    
    
    // client data 
    
    public function clientsData(){
        $clients = Client::get();
        return view('clients.index', compact('clients'));
    }
    
    public function createCleint(){
        return view('clients.create');
    }
    
    
    public function editClient($id){
        $clients = Client::find($id);
        return view('clients.edit' , compact('clients'));
    }
    
    
    public function deleteClient($id){
        $clents = Client::find($id)->delete();
        return back();
    }
    
    
    
     public function storeCleint(Request $request){
         
        //  dd($request);
         
          $imageName = null;
            if($request->file('image')){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }
            
            
        $blogs = Client::create(['title' => $request->title, 'video_link' => $request->video_link, 'tag_desc' =>$request->tagDescription, 'content' => $request->footerdescription , 'image' =>  $imageName ]);
        
        return redirect()->route('clients.index');
        
    }
    
     public function updateClient(Request $request, $id){
         
        //  dd($request);
        
        $client = Client::find($id);
        
         $imageName = $client->image;
            if($request->file('image')){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }
            
            
        $blogs = Client::where('id', $id)->update(['title' => $request->title, 'video_link' => $request->video_link, 'tag_desc' =>$request->tagDescription, 'content' => $request->footerdescription, 'image' =>  $imageName  ]);
        
        return back();
    }
}
