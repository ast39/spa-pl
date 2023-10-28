<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ContactsController extends Controller {

    public function index(): View
    {
        return view('contacts.index');
    }
}
