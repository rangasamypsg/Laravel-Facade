<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductService{

    public function handleUploadedImage( $image ,$product=null, $type=null) {

        if (!empty($image)) {
            if($type =="update"){
                $this->deleteImageSource($product);
            }
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $imageName = "$profileImage";
        }
        return $imageName ?: '';
    }

    public function deleteImageSource($product){

        $destination = public_path('images/'.$product->image);
        if(File::exists($destination)) {
            File::delete($destination);
        }
    }


    public function uploadImage( $image ,$product=null, $type=null) {

        if (!empty($image)) {
            if($type =="update"){
                $this->deleteStorageImage($product);
            }
            $fileName = time() . '.' . $image->extension();
            $imagePath = $image->storeAs('images', $fileName, 'public');
            $imageLocation = '/storage/'.$imagePath;
        }
        return $imageLocation ?: '';
    }

    public function deleteStorageImage($product){

        if(!empty($product->image)) {
            Storage::delete('public/images/' . $product->image);
        }
    }

}
