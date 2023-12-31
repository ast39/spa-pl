<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MainController extends Controller {

    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('main.index');
    }
}
