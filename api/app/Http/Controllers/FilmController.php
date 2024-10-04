<?php

namespace App\Http\Controllers;

use App\Models\Film;

class FilmController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Film());
    }
}
