<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarahs = Sejarah::all();
        return view('page.backend.sejarah.index', compact('sejarahs'));
    }

    public function create()
    {
        return view('page.backend.sejarah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('sejarah', 'public');
        }

        Sejarah::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $path,
            'is_active' => true,
        ]);

        return redirect()->route('sejarah.index')->with('success', 'Sejarah created successfully.');
    }

    public function edit(Sejarah $sejarah)
    {
        return view('page.backend.sejarah.edit', compact('sejarah'));
    }

    public function update(Request $request, Sejarah $sejarah)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('photo')) {
            if ($sejarah->photo) {
                Storage::disk('public')->delete($sejarah->photo);
            }
            $data['photo'] = $request->file('photo')->store('sejarah', 'public');
        }

        $sejarah->update($data);

        return redirect()->route('sejarah.index')->with('success', 'Sejarah updated successfully.');
    }

    public function destroy(Sejarah $sejarah)
    {
        if ($sejarah->photo) {
            Storage::disk('public')->delete($sejarah->photo);
        }
        $sejarah->delete();

        return redirect()->route('sejarah.index')->with('success', 'Sejarah deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->is_active = !$sejarah->is_active;
        $sejarah->save();

        return redirect()->route('sejarah.index');
    }
}
