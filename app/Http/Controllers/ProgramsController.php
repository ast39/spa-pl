<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProgramsController extends Controller {

    public function index(): View
    {
        return view('programs.index');
    }
}
