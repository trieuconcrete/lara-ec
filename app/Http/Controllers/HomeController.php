<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Show the production detail.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductDetail($id)
    {
        return view('frontend.product_detail');
    }
}
