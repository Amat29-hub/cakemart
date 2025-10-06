<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $aboutus = Aboutus::all();
        return view('page.backend.aboutus.index', compact('aboutus'));
    }

    public function create()
    {
        return view('page.backend.aboutus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $data = [
            'description' => $request->description,
            'is_active' => 1,
        ];
    
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('aboutus', 'public');
        }
    
        Aboutus::create($data);
    
        return redirect()->route('aboutus.index')->with('success', 'About Us created successfully.');
    }

    public function edit(Aboutus $aboutu)
    {
        return view('page.backend.aboutus.edit', compact('aboutu'));
    }

    public function update(Request $request, Aboutus $aboutu)
    {
        $request->validate([
            'description' => 'required|string',
            'photo' => 'nullable|image',
        ]);

        $data = $request->only('description');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('aboutus', 'public');
        }

        $aboutu->update($data);

        // redirect ke index setelah sukses
        return redirect()->route('aboutus.index')->with('success', 'About Us updated successfully.');
    }

    public function destroy(Aboutus $aboutu)
    {
        $aboutu->delete();
        return redirect()->route('aboutus.index')->with('success', 'About Us deleted successfully.');
    }

    public function toggleStatus(Aboutus $aboutu)
    {
        $aboutu->is_active = !$aboutu->is_active;
        $aboutu->save();
        return redirect()->route('aboutus.index');
    }
}
