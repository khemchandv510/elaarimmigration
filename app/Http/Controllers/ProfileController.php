<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }

    public function company(){

        $company = Company::find(1);
        return view('home.profile',  compact('company'));
    }

    public function companyUpdate(Request $request){

        $validator = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);

        $Company = Company::find(1);
        $imageName = $Company->logo;

        if($request->hasfile('image')){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

        }

        Company::where('id',1)->update([

            'logo' => $imageName,
            'name' =>  $request->name,
            'email' =>  $request->email,
            'mobile' =>  $request->mobile,
            'country' =>  $request->country,
            'address1' =>  $request->address1,
            'address2' =>  $request->address2,
            'address3' =>  $request->address3,
            'address4' =>  $request->address4,
            'certificates' => $request->certificate,
            'copyright' => $request->copyright,
            'headtag' => $request->scripthead, 
            'bodytag' => $request->scriptBody,  
           
        ]);

        return back()->with('success', 'page has been updated successfully.');
    }
}
