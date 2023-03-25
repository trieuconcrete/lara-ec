<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::with('orders', 'userDetail')->withCount('orders')->where('user_type', 0)->paginate(10);
        return view('admin.client.index', compact('clients'));
    }
}
