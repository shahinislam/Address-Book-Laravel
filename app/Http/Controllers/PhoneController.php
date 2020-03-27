<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(Contact $contact)
    {
        $phones = $contact->phones()->get();

        return view('phones.index', compact('phones','contact'));
    }

    public function create(Contact $contact)
    {
        $phone = new Phone();

        return view('phones.create', compact('phone', 'contact'));
    }

    public function store(Contact $contact)
    {
        $data = request()->validate([
            'name' => 'required',
            'number' => 'required',
        ]);

        $phones = $contact->phones()->create($data);

        return redirect('/contacts/'. $contact->id .'/phones/' . $phones->id)
            ->with('success', 'Phone Number has been Inserted');
    }

    public function show(Contact $contact, Phone $phone)
    {
        return view('phones.show', compact('phone', 'contact'));
    }

    public function edit(Contact $contact, Phone $phone)
    {
        return view('phones.edit', compact('contact','phone'));
    }

    public function update(Contact $contact, Phone $phone)
    {

        $data = request()->validate([
            'name' => 'required',
            'number' => 'required',
        ]);

        $phone->update($data);

        return redirect('/contacts/'. $contact->id .'/phones/' . $phone->id)
            ->with('success', 'Phone Number has been Updated');
    }

    public function destroy(Contact $contact, Phone $phone)
    {
        $phone->delete();

        return redirect('/contacts/' . $contact->id . '/phones')
            ->with('danger', 'Phone Number has been Deleted');
    }

}
