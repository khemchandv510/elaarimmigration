<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\PageContent;
use App\Models\Keyword;
use App\Models\CustomAdd;
class FaqController extends Controller
{
    public function  saveFaq(Request $request){

        $validator = $request->validate([
            'product_id'      => 'required|numeric',
            'faqtitle'      => 'required',
            // 'description' => 'required',
        ]);

        $faq = Faq::create([
            'name' => $request->faqtitle,
            'description' => $request->footerdescription,
            'product_id' => $request->product_id
        ]);

        // dd($faq);
        return back()->with('success', 'Faq has been created successfully.');
    }

    public function  savePageContent(Request $request) {
        $validator = $request->validate([
            'pageImage'      => 'image|mimes:jpeg,png|max:1024',
            'videoLink'      => 'required',
            'product_id'      => 'required|numeric',
        ]);

        if($request->file('pageImage')){

            $imageName = time().'.'.$request->pageImage->getClientOriginalExtension();
            $request->pageImage->move(public_path('images'), $imageName);

        }

        PageContent::create([
            'url' => $request->videoLink,
            'product_title' => $request->titlename,
            'product_id' => $request->product_id,
            'description' => $request->description,
            'image' => isset($imageName) ? $imageName : null,
        ]);

        return back()->with('success', 'Page content has been created successfully.');

    }

    public function savekeywords(Request $request){
        $validator = $request->validate([
            'product_id'      => 'required|numeric',
            'keywordName'      => 'required',
            'keywordUrl' => 'required',
        ]);

        $faq = Keyword::create([
            'name' => $request->keywordName,
            'link' => $request->keywordUrl,
            'product_id' => $request->product_id
        ]);

        return back()->with('success', 'Keywords has been created successfully.');
    }


    
    public function saveCustomAdds(Request $request){
        $validator = $request->validate([
            'product_id'      => 'required|numeric',
            'addsName'      => 'required',
            'addUrl' => 'required',
            'pageImage'      => 'image|mimes:jpeg,png|max:1024',

        ]);


        if($request->file('pageImage')){

            $imageName = time().'.'.$request->pageImage->getClientOriginalExtension();
            $request->pageImage->move(public_path('images'), $imageName);

        }

        
         CustomAdd::create([
            
            'image' => isset($imageName) ? $imageName : null,
            'add_name' => $request->addsName,
            'add_url' => $request->addUrl,
            'product_id' => $request->product_id
        ]);

        return back()->with('success', 'custom adds has been created successfully.');
    }
    
    public function faqDelete(Request $request, $id){
        Faq::where('id', $id)->delete();
        return back()->with('success', 'faq has been deleted successfully.');
        
    }
    
    public function pageDelete(Request $request, $id){
        PageContent::where('id', $id)->delete();
        return back()->with('success', 'faq has been deleted successfully.');
        
    }
    
    
    public function keywordDelete(Request $request, $id){
        Keyword::where('id', $id)->delete();
        return back()->with('success', 'Keyword has been deleted successfully.');
        
    }
    
    public function customAddDelete(Request $request, $id){
        CustomAdd::where('id', $id)->delete();
        return back()->with('success', 'Keyword has been deleted successfully.');
    }
    
    public function pageContentDetails(Request $request, $id){
      $faq =   PageContent::where('id', $id)->first();
         return  response()->json(['status' => true, 'data' => $faq]);
    }
    
    
    
    public function  editPageContent(Request $request) {
        $validator = $request->validate([
            'pageImage'      => 'image|mimes:jpeg,png|max:1024',
            'videoLink'      => 'required',
            'product_id'      => 'required|numeric',
            'pagecontent_id' =>  'required|numeric'
        ]);

        if($request->file('pageImage')){

            $imageName = time().'.'.$request->pageImage->getClientOriginalExtension();
            $request->pageImage->move(public_path('images'), $imageName);

        }
        $PageContent = PageContent::find($request->pagecontent_id);

        PageContent::where('id', $request->pagecontent_id)->update([
            'url' => $request->videoLink,
            'product_title' => $request->titlename,
            'product_id' => $request->product_id,
            'description' => $request->description,
            'image' => isset($imageName) ? $imageName : $PageContent->image,
        ]);

        return back()->with('success', 'Page content has been created successfully.');

    }
    
    
}
