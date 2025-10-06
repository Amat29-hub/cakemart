<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MediaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaSocialController extends Controller
{
    public function index()
    {
        $mediasocials = MediaSocial::all();
        return view('page.backend.mediasocial.index', compact('mediasocials'));
    }

    public function create()
    {
        return view('page.backend.mediasocial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link'            => 'required|url',
            'nameaccount'     => 'required|string|max:255',
            'namemediasocial' => 'required|string|max:255',
            'photo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('mediasocial', 'public');
        }

        MediaSocial::create([
            'link'            => $request->link,
            'nameaccount'     => $request->nameaccount,
            'namemediasocial' => $request->namemediasocial,
            'photo'           => $path,
            'is_active'       => true,
        ]);

        return redirect()->route('mediasocial.index')->with('success', 'Media social created successfully.');
    }

    public function edit(MediaSocial $mediasocial)
    {
        return view('page.backend.mediasocial.edit', compact('mediasocial'));
    }

    public function update(Request $request, MediaSocial $mediasocial)
    {
        $request->validate([
            'link'            => 'required|url',
            'nameaccount'     => 'required|string|max:255',
            'namemediasocial' => 'required|string|max:255',
            'photo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['link','nameaccount','namemediasocial']);

        if ($request->hasFile('photo')) {
            if ($mediasocial->photo) {
                Storage::disk('public')->delete($mediasocial->photo);
            }
            $data['photo'] = $request->file('photo')->store('mediasocial', 'public');
        }

        $mediasocial->update($data);

        return redirect()->route('mediasocial.index')->with('success', 'Media social updated successfully.');
    }

    public function destroy(MediaSocial $mediasocial)
    {
        if ($mediasocial->photo) {
            Storage::disk('public')->delete($mediasocial->photo);
        }
        $mediasocial->delete();
        return redirect()->route('mediasocial.index')->with('success', 'Media social deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $mediasocial = MediaSocial::findOrFail($id);
        $mediasocial->is_active = !$mediasocial->is_active;
        $mediasocial->save();
        return redirect()->route('mediasocial.index');
    }
}
