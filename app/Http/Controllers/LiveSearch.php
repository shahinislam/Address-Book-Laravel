<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Illuminate\Support\Facades\DB;

class LiveSearch extends Controller
{
    function index()
    {
        return view('live_search');
    }

    public function action(Request $request)
    {

    }
}
