<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['unsubscribe']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function unsubscribe(Request $request){
        $findEmail = Email::where('email', $request->email)->first();
        if(!empty($findEmail)){
            // dd($findEmail);
            Email::where('email', $request->email)->update(['unsubscribe' => 1]);
            
        }
        
        return '<h2> Unsubscribe successful </h2>';
    }
    
    
}
