<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $banners = Banner::when($search, function ($query, $search) {
                $query->where('banner_title', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.banner', compact('banners'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'banner_title' => 'required|string|max:255'
        ]);

        $bannerName = null;

        if ($request->hasFile('banner')) {
            $bannerName = time().'_'.$request->banner->getClientOriginalName();
            $request->banner->move(public_path('uploads/banners'), $bannerName);
        }

        Banner::create([
            'banner' => $bannerName,
            'banner_title' => $request->banner_title
        ]);

        return redirect()->back()->with('success','Banner added successfully');
    }


    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'banner' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'banner_title' => 'required|string|max:255'
        ]);

        $data = [
            'banner_title' => $request->banner_title
        ];

        if ($request->hasFile('banner')) {

            if ($banner->banner && File::exists(public_path('uploads/banners/'.$banner->banner))) {
                File::delete(public_path('uploads/banners/'.$banner->banner));
            }

            $bannerName = Str::uuid().'.'.$request->banner->extension();
            $request->banner->move(public_path('uploads/banners'), $bannerName);

            $data['banner'] = $bannerName;
        }

        $banner->update($data);

        return redirect()->back()->with('success','Banner updated successfully');
    }
}