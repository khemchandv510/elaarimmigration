<?php

namespace App\Http\Controllers;
use App\Models\Smtpconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Str;

class SmtpController extends Controller
{
    public function index()
    {
        $smtpconfig = Smtpconfig::get();
        // dd($smtpconfig);
        return view('smtp-config', compact('smtpconfig'));
    }

    // public function store(Request $request)
    // {
    //    $EmailGroup = new EmailGroup;
    //    $EmailGroup->name = $request->groupname;
    //    $EmailGroup->unique_id = Str::random(9);
    //    $EmailGroup->status = 1;
       
    //    $EmailGroup->save();

    //     return redirect()->back()->with('success', 'Email group added.');
    // }
}
