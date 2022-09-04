<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        return view('frontend/index');
    }
}
