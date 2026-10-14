<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildPanel;
use Illuminate\Http\Request;

class ChildPanelController extends Controller
{
    public function index()
    {
        $panels = ChildPanel::with('user')->latest()->paginate(20);
        return view('admin.child_panels.index', compact('panels'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,active,disabled,rejected',
        ]);

        $panel = ChildPanel::findOrFail($id);
        $panel->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Child panel status updated successfully!');
    }
}