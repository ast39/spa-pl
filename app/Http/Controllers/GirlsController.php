<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GirlsController extends Controller {

    public function index(): View
    {
        return view('girls.index');
    }
}
