<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
            $filename = time().'.'.$ext;
            $file->storeAs($path, $filename);
            return $path.$filename;
        }
        return null;
    }
}
