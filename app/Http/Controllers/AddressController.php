<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Contact $contact)
    {
        $address = $contact->address()->get();

        return view('address.index', compact('address','contact'));
    }

    public function create(Contact $contact)
    {
        $address = new Address();

        return view('address.create', compact('address', 'contact'));
    }

    public function store(Contact $contact)
    {
        $data = request()->validate([
            'name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        $address = $contact->address()->create($data);

        return redirect('/contacts/'. $contact->id .'/address/' . $address->id)
            ->with('success', 'Address has been Inserted');
    }

    public function show(Contact $contact, Address $address)
    {
        return view('address.show', compact('address', 'contact'));
    }

    public function edit(Contact $contact, Address $address)
    {
        return view('address.edit', compact('contact','address'));
    }

    public function update(Contact $contact, Address $address)
    {

        $data = request()->validate([
            'name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
        ]);

        $address->update($data);

        return redirect('/contacts/'. $contact->id .'/address/' . $address->id)
                        ->with('success', 'Address has been Updated');
    }

    public function destroy(Contact $contact, Address $address)
    {
        $address->delete();

        return redirect('/contacts/' . $contact->id . '/address')
                        ->with('danger', 'Address has been Deleted');
    }

}
