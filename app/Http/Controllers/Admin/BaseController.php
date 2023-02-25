<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    public function uploadImage($path, $file, $filePath = null)
    {
        if ($file) {
            // remove file
            if ($filePath) {
                $fileStoragePath = storage_path().'/'.$filePath;
                if(File::exists($fileStoragePath)) {
                    File::delete($fileStoragePath);
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
