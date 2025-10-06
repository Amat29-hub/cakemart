<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenagaKerjaController extends Controller
{
    public function index()
    {
        $tenagakerja = TenagaKerja::all();
        return view('page.backend.tenagakerja.index', compact('tenagakerja'));
    }

    public function create()
    {
        return view('page.backend.tenagakerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('tenagakerja', 'public');
        }

        TenagaKerja::create([
            'name'        => $request->name,
            'position'    => $request->position,
            'description' => $request->description,
            'photo'       => $path,
            'is_active'   => true,
        ]);

        return redirect()->route('tenagakerja.index')->with('success', 'Tenaga kerja created successfully.');
    }

    public function edit(TenagaKerja $tenagakerja)
    {
        return view('page.backend.tenagakerja.edit', compact('tenagakerja'));
    }

    public function update(Request $request, TenagaKerja $tenagakerja)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'description' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name','position','description']);

        if ($request->hasFile('photo')) {
            if ($tenagakerja->photo) {
                Storage::disk('public')->delete($tenagakerja->photo);
            }
            $data['photo'] = $request->file('photo')->store('tenagakerja', 'public');
        }

        $tenagakerja->update($data);

        return redirect()->route('tenagakerja.index')->with('success', 'Tenaga kerja updated successfully.');
    }

    public function destroy(TenagaKerja $tenagakerja)
    {
        if ($tenagakerja->photo) {
            Storage::disk('public')->delete($tenagakerja->photo);
        }
        $tenagakerja->delete();
        return redirect()->route('tenagakerja.index')->with('success', 'Tenaga kerja deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $tenagakerja = TenagaKerja::findOrFail($id);
        $tenagakerja->is_active = !$tenagakerja->is_active;
        $tenagakerja->save();
        return redirect()->route('tenagakerja.index');
    }
}
