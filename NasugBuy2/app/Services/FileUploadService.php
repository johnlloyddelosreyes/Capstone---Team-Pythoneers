<?php

namespace App\Services;

use Image;

class FileUploadService{

    protected $path = 'image/products/';

    public function uploadImage($file){
        if($file){
            $extension = $file->getClientOriginalExtension();
            $filename = time().uniqid().pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.'.$extension;
            Image::make($file)->resize( 100, 100)->save($this->path.$filename);
            return $filename;
        }
        return false;
    }
}
