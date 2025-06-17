<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function storeContact(Request $request)
    {
        // Validacija
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Čuvanje u bazu
        Contact::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'The message was sent successfully!');
    }
    
    public function allContacts()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function editContact(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function updateContact(Request $request, Contact $contact)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact->update([
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'The contact has been successfully updated!');
    }

    public function deleteContact(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully!');
    }

}
