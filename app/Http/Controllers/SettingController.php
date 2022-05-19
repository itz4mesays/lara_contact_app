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
        $imageHandler = new ImageHandler($request);
        $profileData = $imageHandler->uploadImage();
        
        $request->user()->update($profileData);

        return back()->with('success','Profile updated successfully');
    }

}
