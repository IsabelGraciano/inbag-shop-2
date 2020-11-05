<?php 

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ImageLocalStorage implements ImageStorage {

    public function save($request){
        if($request->hasFile('donation_image')) {
            $fileNameWithExtension = $request->file('donation_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('donation_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            Storage::disk('s3')->put($fileNameToStore,file_get_contents($request->file('donation_image')->getRealPath()));
        }
        
        Product::validate($request);
        $product = new product();

        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $nameImage);
            $product->setImage($nameImage);
        }

        $product->setName($request->name);
        $product->setSize($request->size);
        $product->setCategory($request->category);
        $product->setDescription($request->description);
        $product->setColor($request->color);
        $product->setPrice($request->price);
        $product->save();

        return back();
    }
}