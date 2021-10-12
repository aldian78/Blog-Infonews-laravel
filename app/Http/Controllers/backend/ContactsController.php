<?php

namespace App\Http\Controllers\backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        return view('backend.contacts', [
            'title'     => 'Halaman contact',
            'contacts'  => Contact::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required|max:255',
            'pesan'   => 'required'
        ]);

        Contact::create($validated);
        return back()->with('success', 'Message anda berhasil dikirim!');
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect('/contacts')->with('success', 'Message berhasil dihapus');
    }
}
