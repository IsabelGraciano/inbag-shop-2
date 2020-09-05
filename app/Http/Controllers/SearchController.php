<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;
use Dotenv\Result\Result;

class SearchController extends Controller
{
    public function results(Request $request){
        $data=[];
        $data["results"] = Product::
    }  
}