<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('page.backend.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('page.backend.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $path = null;
        if ($request->hasFile('photo_profile')) {
            $path = $request->file('photo_profile')->store('testimonials', 'public');
        }

        Testimonial::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo_profile' => $path,
            'rating' => $request->rating,
            'is_active' => true,
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('page.backend.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $data = $request->only(['name','description','rating']);

        if ($request->hasFile('photo_profile')) {
            if ($testimonial->photo_profile) {
                Storage::disk('public')->delete($testimonial->photo_profile);
            }
            $data['photo_profile'] = $request->file('photo_profile')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo_profile) {
            Storage::disk('public')->delete($testimonial->photo_profile);
        }
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_active = !$testimonial->is_active;
        $testimonial->save();
        return redirect()->route('testimonial.index');
    }
}
