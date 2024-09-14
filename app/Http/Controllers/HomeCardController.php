<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\HomepageCard;

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
}

    