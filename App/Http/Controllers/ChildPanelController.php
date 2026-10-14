<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildPanel;
use Illuminate\Support\Str;

class ChildPanelController extends Controller
{
    public function index()
    {
        $panels = ChildPanel::where('user_id', auth()->id())->get();
        return view('user.child_panels.index', compact('panels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain' => 'required|string|unique:child_panels,domain',
            'panel_name' => 'required|string|max:255',
            'markup_percentage' => 'required|numeric|min:0',
        ]);

        ChildPanel::create([
            'user_id' => auth()->id(),
            'domain' => $request->domain,
            'panel_name' => $request->panel_name,
            'markup_percentage' => $request->markup_percentage,
            'api_key' => Str::random(32),
            'status' => 'active',
        ]);

        return back()->with('success', 'Child panel created successfully!');
    }
}