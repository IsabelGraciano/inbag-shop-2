<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;
use App\Donation;
use App\Product;


class ImageController extends Controller
{
    public function save(Request $request, $language){
        $storeInterface = app(ImageStorage::class);
        $storeInterface->save($request);
        return back()->with('success','Image uploaded successfully!');
    }
}