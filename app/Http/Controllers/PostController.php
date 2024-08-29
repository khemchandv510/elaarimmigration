<?php  
namespace App\Http\Controllers;  
use Illuminate\Http\Request;  
use App\Models\Post;
use App\Models\EmailTemplate;
use Auth;
use Illuminate\Support\Facades\Validator;
use Session;
class PostController extends Controller  
{  
    /** 
     * Display a listing of the resource. 
     * @return \Illuminate\Http\Response 
     */  
public function index()  
{  
     // $userid  = Auth::user()->id;
     // dd($userid);
    $posts = EmailTemplate::paginate(15);
    return view('posts.index', compact('posts'));
          
// dd('test');
      
}  
/** 
     * Show the form for creating a new resource. 
     * @return \Illuminate\Http\Response 
       
*/  
 public function create()  
{  
     return view('posts.create');
      
}  
/** 
     * Store a newly created resource in storage. 
     * 
     * @param  \Illuminate\Http\Request   $request 
     * @return \Illuminate\Http\Response 
     */  
public function store(Request $request)  
{
     //  dd($request);    
     
      $validator = Validator::make($request->all(), [
          'posttitle' => 'required|',
          'contentdata' => 'required',
      ]);

      if ($validator->fails()) {
          return back()->with(Session::flash('message', 'All the Fields are required'));
     }

     $data = new EmailTemplate;
     $data->template_name = $request->posttitle;
     $data->subject = $request->subject;
     $data->content = $request->contentdata; 
       
     $data->save();

     return redirect('posts')->with(Session::flash('message', 'Blogs is created'));
}  
/** 
     * Display the specified resource. 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */  
public function show($id)  
{  
     dd('show');      
     //  
  //  
}  
/** 
     * Show the form for editing the specified resource. 
     * @param  int  $id 
     * @return  \Illuminate\Http\Response 
     */  
 public function edit($id)  
      
{
     $post = EmailTemplate::find($id);
     return view('posts.edit', compact('post'));
     // dd('edit');      
     //  
      
}  
/** 
     * Update the specified resource in storage. 
     * @param  \Illuminate\Http\Request   $request 
     * @param  int  $id 
     * @return \Illuminate\Http\Response 
     */  
 public function update(Request $request, $id)  
{  
     $validator = Validator::make($request->all(), [
          'posttitle' => 'required|',
          'contentdata' => 'required',
      ]);

      if ($validator->fails()) {
          return back()->with(Session::flash('message', 'All the Fields are required'));
     }

     $data = EmailTemplate::find($request->blogid);
     $data->template_name = $request->posttitle;
     $data->subject = $request->subject;
     $data->content = $request->contentdata; 
       
     $data->save();

     return redirect('posts')->with(Session::flash('message', 'Blogs is updated'));
      
}  
/** 
     * Remove the specified resource from storage. 
     * @param  int  $id 
     * @return  \Illuminate\Http\Response 
     */  
 public function destroy($id)  
 {  

     $post = Post::find($id);
        $post->delete();

        Session::flash('message', 'Successfully deleted the blog!');
        return back();
    }
}  