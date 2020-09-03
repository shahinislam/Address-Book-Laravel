<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = auth()->user()->contacts()
                                  ->orderBy('firstname', 'asc')
                                  ->paginate(5);

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

        $contact = auth()->user()->contacts()->create($data);

        return redirect('/contacts/' . $contact->id)
            ->with('success', 'Contact has been Inserted');
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
            'birth' => 'required|date',
        ]);

        $contact->update($data);

        return redirect('/contacts/' . $contact->id)
            ->with('success', 'Contact has been Updated');
    }

    public function destroy(Contact $contact)
    {
        $name = $contact->firstname .' '. $contact->lastname;
        $contact->address()->delete();
        $contact->delete();

        return redirect()->back()->with('danger', $name . ' Contact has been Deleted');
    }

}
