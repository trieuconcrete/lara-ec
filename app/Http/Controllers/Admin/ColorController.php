<?php

namespace App\Http\Controllers\Admin;

class ColorController extends BaseController
{
    public function index()
    {
        return view('admin.color.index');
    }
}
