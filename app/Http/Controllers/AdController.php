<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Ad;
use Illuminate\Support\Str;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $ads = Ad::when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.ad', compact('ads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'amount' => 'required',
            'link' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

         $imageName = time().'_'.$request->image->getClientOriginalName();
         $request->image->move(public_path('uploads/ads'), $imageName);

        Ad::create([
            'name' => $request->name,
            'image' => $imageName,
            'amount' => $request->amount,
            'link' => $request->link,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect()->back()->with('success', 'Ad added successfully');
    }

    public function update(Request $request, $id)
{
    $ad = Ad::findOrFail($id);

    $request->validate([
        'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'name' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'link' => 'nullable|string|max:255',
        'start_date' => 'required',
        'end_date' => 'required'
    ]);

    $data = $request->only([
        'name',
        'amount',
        'link',
        'start_date',
        'end_date'
    ]);

    if ($request->hasFile('image')) {

        if ($ad->image && file_exists(public_path('uploads/ads/'.$ad->image))) {
            unlink(public_path('uploads/ads/'.$ad->image));
        }

        $imageName = Str::uuid().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/ads'), $imageName);

        $data['image'] = $imageName;
    }

    $ad->update($data);

    return redirect()->back()->with('success','Ad updated successfully');
}
}