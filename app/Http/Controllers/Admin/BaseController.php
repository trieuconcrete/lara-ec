<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BaseController extends Controller
{
    public function uploadImage($path, $file, $filePath = null)
    {
        if(!Storage::exists($path)) {
            Storage::makeDirectory($path, 0775, true); //creates directory
        }
        if ($file) {
            // remove file
            if ($filePath) {
                if(Storage::exists($filePath)) {
                    Storage::delete($filePath);
                }
            }
            $ext = $file->getClientOriginalExtension();
            $filename = time().'-'.Str::random(5).'.'.$ext;
            $file->storeAs($path, $filename);
            return $path.$filename;
        }
        return null;
    }
}
