<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;

trait UploadTrait {
    public function uploadImage($path, $file, $isThumb = false, $filePath = null, $thumbPath = null, $width = null, $height = null)
    {
        try {
            $this->makeFolder(($path));
            if ($file) {
                // remove file
                $this->removeFile($filePath);
                // remove thumb file
                $this->removeFile($thumbPath);

                $ext = $file->getClientOriginalExtension();
                $name = time().'_'.Str::random(5);
                $fileName = $name.'.'.$ext;
                $file->storeAs($path, $fileName);
                if ($isThumb) {
                    $this->saveImageThumb($path, $file, $name, $width, $height);
                }
                return $fileName;
            }
            return null;
        } catch(\Exception $e) {
            return $e;
        }
    }

    public function saveImageThumb($path, $file, $imageName, $width, $height)
    {
        try {
            if (!$width) {
                $width = 160;
            }
            if (!$height) {
                $height = 200;
            }
            $destinationPathThumbnail = $path . 'thumbnail';
            $this->makeFolder(($destinationPathThumbnail));

            $img = Image::make($file->getRealPath());
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();

            $ext = $file->getClientOriginalExtension();
            $fileNameThumb = $imageName."_thumb.{$ext}";
            // Remove file if exist
            $this->removeFile($destinationPathThumbnail . '/' . $fileNameThumb);
            // Store file
            Storage::disk('public')->put($destinationPathThumbnail . '/' . $fileNameThumb, $img);
        } catch(\Exception $e) {
            return $e;
        }
    }

    // Remove File
    public function removeFile($filePath)
    {
        if ($filePath) {
            if(Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
    }

    // Create Directory
    public function makeFolder($path)
    {
        if(!Storage::exists($path)) {
            Storage::makeDirectory($path, 0775, true); // creates directory
        }
    }
}
