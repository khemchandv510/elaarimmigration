<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Email;
use Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Email::orderby('id', 'desc')->paginate(200);
       return view('tasks.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|',
            'email' => 'required|email|unique:emails,email',
        ]);
  
        if ($validator->fails()) {
            return back()->with(Session::flash('message', 'All the Fields are required'));
       }
  
       $data = new Email;
       $data->name = $request->name;
       $data->email = $request->email; 
       $data->status = '0';
       $data->date = date("Y/m/d");
             
       $data->save();
  
       return redirect('emails')->with(Session::flash('message', 'Task is created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Task::find($id);
        return view('tasks.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'posttitle' => 'required|',
            'contentdata' => 'required',
            'due_date' => 'required',
            
        ]);
  
        if ($validator->fails()) {
            return back()->with(Session::flash('message', 'All the Fields are required'));
       }
  
       $data = Task::find($id);
       $data->title = $request->posttitle;
       $data->description = $request->contentdata; 
       $data->status = $request->btnradio;
       $data->due_date = $request->due_date;
       
       $data->user_id = Auth::user()->id;   
         
       $data->save();
  
       return redirect('task')->with(Session::flash('message', 'Task is Updated'));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Email::find($id);
        $post->delete();

        Session::flash('message', 'Successfully deleted the email!');
        return back();
    }
}
