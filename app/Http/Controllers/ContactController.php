<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact();

        return view('contacts.create', compact('contact'));
    }

    public function store()
    {
        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'birth' => 'required',
        ]);

        $contact = Contact::create($data);

        return redirect('/contacts/' . $contact->id);
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Contact $contact)
    {

        $data = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'birth' => 'required',
        ]);

        $contact->update($data);

        return redirect('/');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('/');
    }

}
