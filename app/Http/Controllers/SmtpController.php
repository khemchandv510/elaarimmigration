<?php

namespace App\Http\Controllers;
use App\Models\Smtpconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Str;
use App\Models\Socialmedia;

class SmtpController extends Controller
{
    public function index()
    {
        $smtpconfig = Smtpconfig::get();
        // dd($smtpconfig);
        return view('smtp-config', compact('smtpconfig'));
    }

    public function showMedia(Request $request){
        $Socialmedia = Socialmedia::find(1);
        return view('media', compact('Socialmedia'));
    }

    public function SaveMedia(Request $request){

        $Socialmedia = Socialmedia::where('id', 1)->update(['facebook' => $request->facebook, 'twitter' => $request->twitter, 'instagram' => $request->instagram , 'linkdin' => $request->lindedin, 'youtube' => $request->youtube, 'pinterest' => $request->pinterest ]);
        return back();
    }

    // $Socialmedia = Socialmedia::where('id', 1)->update(['facebook' => $request->facebook]);
// 

   
}
