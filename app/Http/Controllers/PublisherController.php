<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Publisher;
use Illuminate\Support\Str;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publisher', compact('publishers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'publisher_logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'publisher_name' => 'required'
        ]);

        $publisher_logoName = time().'_'.$request->publisher_logo->getClientOriginalName();

        $request->publisher_logo->move(
            public_path('uploads/publisher_logo'),
            $publisher_logoName
        );

        Publisher::create([
            'publisher_logo' => $publisher_logoName,
            'publisher_name' => $request->publisher_name
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::findOrFail($id);

        $request->validate([
            'publisher_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'publisher_name' => 'required'
        ]);

        $data = [
            'publisher_name' => $request->publisher_name
        ];

        if ($request->hasFile('publisher_logo')) {

            if ($publisher->publisher_logo && file_exists(public_path('uploads/publisher_logo/'.$publisher->publisher_logo))) {
                unlink(public_path('uploads/publisher_logo/'.$publisher->publisher_logo));
            }

            $publisher_logoName = Str::uuid().'.'.$request->publisher_logo->extension();

            $request->publisher_logo->move(
                public_path('uploads/publisher_logo'),
                $publisher_logoName
            );

            $data['publisher_logo'] = $publisher_logoName;
        }

        $publisher->update($data);

        return redirect()->back();
    }
}
