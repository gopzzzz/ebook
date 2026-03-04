<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Publisher;

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
            'publisher_name' => 'required'
        ]);

        Publisher::create([
            'publisher_name' => $request->publisher_name
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::findOrFail($id);

        $request->validate([
            'publisher_name' => 'required'
        ]);

        $publisher->update([
            'publisher_name' => $request->publisher_name
        ]);

        return redirect()->back();
    }
    
}