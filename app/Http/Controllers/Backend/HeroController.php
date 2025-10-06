<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('page.backend.hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('page.backend.hero.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image',
            'title' => 'required|string|max:255',
        ]);

        $path = $request->file('photo')->store('heroes', 'public');

        Hero::create([
            'photo' => $path,
            'title' => $request->title,
            'is_active' => 1,
        ]);

        return redirect()->route('hero.index')->with('success', 'Hero created successfully.');
    }

    public function edit(Hero $hero)
    {
        return view('page.backend.hero.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image',
        ]);

        $data = $request->only('title');
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('heroes', 'public');
        }

        $hero->update($data);

        return redirect()->route('hero.index')->with('success', 'Hero updated successfully.');
    }

    public function destroy(Hero $hero)
    {
        $hero->delete();
        return redirect()->route('hero.index')->with('success', 'Hero deleted successfully.');
    }

    public function toggleStatus(Hero $hero)
    {
        $hero->is_active = !$hero->is_active;
        $hero->save();
        return redirect()->route('hero.index');
    }
}
