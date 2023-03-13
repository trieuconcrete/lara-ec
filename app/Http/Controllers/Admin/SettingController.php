<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::select('key', 'value', 'comment')->get();
        return view('admin.setting.index', compact('settings'));
    }

    public function setting(Request $request)
    {
        dd($request->all());
        return $request->all();
    }
}
