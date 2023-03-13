<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends BaseController
{
    public function index()
    {
        $settings = Setting::select('key', 'value', 'comment')->get();
        return view('admin.setting.index', compact('settings'));
    }

    public function setting(Request $request)
    {
        try {
            foreach ($request->values as $key => $value) {
                if ($value) {
                    $data = [
                        'value' => $value,
                        'comment' => $request->comments[$key] ?? null
                    ];
                    if ($key == 'logo_header' || $key == 'logo_footer') {
                        $image = Setting::where('key', $key)->first();
                        $data['value'] = $this->uploadImage($path = 'uploads/settings/', $value, $image->value);
                    }
                    Setting::where('key', $key)->update($data);
                }
            }
        return redirect(route('admin.setting.index'))->with('message', 'Setting Updated Successfully!');
        } catch (\Exception $e) {
            return redirect(route('admin.setting.index'))->with('error', "Oops an error occurred!</br>Errors:" . $e->getMessage());
        }
    }
}
