<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use DB;

class CompanyProfileController extends Controller
{
public function index()
{
    $profile =DB::table('profiles')->first();

    if (!$profile) {
        $profile = Profile::create([
            'name' => 'Aron Books'
        ]);
    }
    $admin=DB::table('profiles')->first();
 //echo "<pre>";print_r( $profile);exit;
    return view('admin.profile', compact('profile','admin'));
}

  
public function update(Request $request)
{
    try {

        $data = [
            'name' => $request->name ?? null,
            'description' => $request->description ?? null,
            'phone_number' => $request->phone_number ?? null,
            'email' => $request->email ?? null,
            'facebook_link' => $request->facebook_link ?? null,
            'youtube_link' => $request->youtube_link ?? null,
            'insta_link' => $request->insta_link ?? null,
            'twitter_link' => $request->twitter_link ?? null,
            'address' => $request->address ?? null,
        ];

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile'), $filename);

            $data['logo'] = $filename;
        }

        DB::table('profiles')->update($data);

        return back()->with('success', 'Profile updated');

    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong');
    }
}

}
