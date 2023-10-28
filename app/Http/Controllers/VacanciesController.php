<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class VacanciesController extends Controller {

    public function index(): View
    {
        return view('vacancies.index');
    }
}
