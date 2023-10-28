<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class InteriorController extends Controller {

    public function index(): View
    {
        return view('interior.index');
    }
}
