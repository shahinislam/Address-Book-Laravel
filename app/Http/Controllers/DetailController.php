<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Contact $contact)
    {
        $address = $contact->address()->get();
        $phone = $contact->phones()->get();

        return view('details.index', compact('contact', 'address', 'phone'));
    }
}
