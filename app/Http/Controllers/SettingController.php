<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ImageHandler;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('setting.profile')->with('user', auth()->user());
    }

    public function edit(ProfileUpdateRequest $request)
    {
        $profileData = $request->validated();
        $req = $request->user();

        if($request->hasFile('profile_picture')){
            $imageHandler = new ImageHandler($request);
            $result = $imageHandler->uploadImage(); //returns fileName empty or not
            $profileData['profile_picture'] = $result;
        }
        
        $req->update($profileData);

        return back()->with('success','Profile updated successfully');
    }

}
