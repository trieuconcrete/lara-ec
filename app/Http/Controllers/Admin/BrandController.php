<?php

namespace App\Http\Controllers\Admin;

class BrandController extends BaseController
{
    public function index()
    {
        return view('admin.brand.index');
    }
}
