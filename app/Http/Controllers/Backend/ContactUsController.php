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
