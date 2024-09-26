<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\PageContent;
use App\Models\Keyword;
use App\Models\CustomAdd;
use App\Models\Pagecard;

class FaqController extends Controller
{
    public function  saveFaq(Request $request){

        $validator = $request->validate([
            // 'product_id'      => 'required|numeric',
            'faqtitle'      => 'required',
            // 'description' => 'required',
        ]);

        $faq = Faq::create([
            'name' => $request->faqtitle,
            'description' => $request->footerdescription,
            'product_id' => isset($request->product_id) ? $request->product_id : null ,
            'page_id' => isset($request->page_id) ? $request->page_id : null
         ]);

        return back()->with('success', 'Faq has been created successfully.');
    }

    public function  savePageContent(Request $request) {
        $validator = $request->validate([
            'pageImage'      => 'image|mimes:jpeg,png,jpg,webp|max:1024',
            // 'videoLink'      => 'required',
            // 'product_id'      => 'required|numeric',
        ]);

        if($request->file('pageImage')){

            $imageName = time().'.'.$request->pageImage->getClientOriginalExtension();
            $request->pageImage->move(public_path('images'), $imageName);

        }

        PageContent::create([
            'url' => $request->videoLink,
            'product_title' => $request->titlename,
            'product_id' => $request->product_id,
            'page_id' => $request->page_id,
            'description' => $request->description,
            'image' => isset($imageName) ? $imageName : null,
        ]);

        return back()->with('success', 'Page content has been created successfully.');

    }

    public function savekeywords(Request $request){
        $validator = $request->validate([
            // 'product_id'      => 'required|numeric',
            'keywordName'      => 'required',
            'keywordUrl' => 'required',
        ]);

        $faq = Keyword::create([
            'name' => $request->keywordName,
            'link' => $request->keywordUrl,
            'product_id' => $request->product_id,
            'page_id' => $request->page_id

        ]);

        return back()->with('success', 'Keywords has been created successfully.');
    }

    public function savepageCard(Request $request){
        $faq = Pagecard::create([
            'product_id' => $request->product_id,
            'keyword' => $request->keywordName,
            'url' => $request->keywordUrl,

        ]);
        return back()->with('success', 'Page card has been created successfully.');
        
    }

    
    public function UpdatePageCard(Request $request){
        $faq = Pagecard::where('id', $request->editPagecardId)->update([
            'keyword' => $request->keywordName,
            'url' => $request->keywordUrl,
        ]);

        return back()->with('success', 'Page card has been updated successfully.');
    }

    
    public function deleteSavepageCard($id){
        $faq = Pagecard::where('id', $id)->delete();

        return back()->with('success', 'Page card has been updated successfully.');
    }

    
    public function getSavepageCard($id){
        $faq = Pagecard::find($id);
        return response()->json(['status' => true,  'data' => $faq]);
    }


    public function FaqDetails($id){
       $faqs =  Faq::where('id', $id)->first();
       return response()->json(['status' => true,  'data' => $faqs]);
    }


    
    public function saveCustomAdds(Request $request){
        $validator = $request->validate([
            // 'product_id'      => 'required|numeric',
            'addsName'      => 'required',
            'addUrl' => 'required',
            // 'pageImage'      => 'image|mimes:jpeg,png,jpg,webp|max:1024',

        ]);


        if($request->file('pageImage')){

            $imageName = time().'.'.$request->pageImage->getClientOriginalExtension();
            $request->pageImage->move(public_path('images'), $imageName);

        }

        
         CustomAdd::create([
            
            'image' => isset($imageName) ? $imageName : null,
            'add_name' => $request->addsName,
            'add_url' => $request->addUrl,
            'product_id' => $request->product_id,
            'page_id' => $request->page_id
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
            'pageImage'      => 'image|mimes:jpeg,png,jpg,webp|max:1024',
            // 'videoLink'      => 'required',
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

    public function updateFaqData(Request $request){
        Faq::where('id', $request->faqedit_id)->update(['name' => $request->faqtitle, 'description' => $request->footerdescription]);
        return back();
    }
    

    public function KeywordsUpdate(Request $request){

        Keyword::where('id', $request->keyword_id)->update(['name' => $request->keywordName, 'link' => $request->keywordUrl ]);
        return back();

    }   

    public function KeywordsDetails($id){
       $faq =  Keyword::find($id);
        return  response()->json(['status' => true, 'data' => $faq]);

    }

    public function customAddsDetails($id){
        $CustomAdd  = CustomAdd::find($id);
        return response()->json(['status' => true, 'data' => $CustomAdd]); 
    }

    
    public function customAddsDetete($id){
        $CustomAdd  = CustomAdd::find($id)->delete();
        return back();
        // return response()->json(['status' => true, 'data' => $CustomAdd]); 
    }

    public function customAddsUpdate(Request $request){

        $customadd = CustomAdd::find($request->customEditId);
        $imageName = $customadd->image;
        if($request->file('pageImage')){

            $imageName = time().'.'.$request->pageImage->getClientOriginalExtension();
            $request->pageImage->move(public_path('images'), $imageName);

        }


        CustomAdd::where('id', $request->customEditId)->update(['add_name' => $request->addsName , 'add_url' => $request->addUrl,  'image' => $imageName]);

        return back();
    }

    public function deletePageImage($id){
        PageContent::where('id', $id)->update([
           
            'image' => null,
        ]);

        return back()->with('success', 'Page content has been created successfully.');
    }
    
}
