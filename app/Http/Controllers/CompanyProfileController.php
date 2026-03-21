<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;

class CompanyProfileController extends Controller
{
   public function index()
{
    $profile = Profile::first();

    if (!$profile) {
        $profile = Profile::create([
            'name' => 'Aron Books'
        ]);
    }

    return view('admin.profile', compact('profile'));
}

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'description' => 'nullable',
            'facebook_link' => 'nullable',
            'youtube_link' => 'nullable',
            'insta_link' => 'nullable',
            'twitter_link' => 'nullable',
            'address' => 'nullable',
            'phone_number' => 'nullable',
            'email' => 'nullable|email'
]);
        $logoName = null;

        if ($request->hasFile('logo')) {
            $logoName = time().'_'.$request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads/profile'), $logoName);
        }

        Profile::create([
            'logo' => $logoName,
            'name' => $request->name,
            'description' => $request->description,
            'facebook_link' => $request->facebook_link,
            'youtube_link' => $request->youtube_link,
            'insta_link' => $request->insta_link,
            'twitter_link' => $request->twitter_link,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required'
        ]);

        $logoName = $profile->logo;

        if ($request->hasFile('logo')) {
            $logoName = time().'_'.$request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads/profile'), $logoName);
        }

        $profile->update([
            'logo' => $logoName,
            'name' => $request->name,
            'description' => $request->description,
            'facebook_link' => $request->facebook_link,
            'youtube_link' => $request->youtube_link,
            'insta_link' => $request->insta_link,
            'twitter_link' => $request->twitter_link,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email
        ]);

        return redirect()->back();
    }

}
