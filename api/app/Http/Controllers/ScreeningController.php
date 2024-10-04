<?php

namespace App\Http\Controllers;

use App\Models\Screening;

class ScreeningController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Screening());
    }
}
