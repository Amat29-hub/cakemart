<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Tampilkan semua pesan contact us
     */
    public function index()
    {
        $contacts = ContactUs::latest()->get();
        return view('page.backend.contactus.index', compact('contacts'));
    }

    /**
     * Simpan data contact form dari user
     */
    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    ContactUs::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'subject' => $request->subject,
        'description' => $request->description,
        'is_seen' => 0,
    ]);

    return redirect()->route('contactus.index')->with('success', 'Pesan berhasil dikirim.');
}


    /**
     * Tampilkan detail pesan contact us
     */
    public function show($id)
    {
        $contact = ContactUs::findOrFail($id);

        // otomatis ubah jadi sudah dilihat ketika dibuka
        if ($contact->is_seen == 0) {
            $contact->is_seen = 1;
            $contact->save();
        }

        return view('page.backend.contactus.show', compact('contact'));
    }

    /**
     * Hapus pesan contact us
     */
    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();

        return redirect()
            ->route('contactus.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
