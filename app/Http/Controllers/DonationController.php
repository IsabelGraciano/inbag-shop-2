<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Http\Request\PostStoreRequest;
use Illuminate\Http\Request\PostUpdateRequest;

use App\Http\Controllers\Post;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Storage;
use App\Donation;

class DonationController extends Controller
{   
    
    /*
    public function show($id)
    {
        $data = []; //to be sent to the view

        $listProducts = array();

        $listProducts[121] = array("name"=>"Tv samsung", "price"=>"1000");   
        $listOfSizes = array("XS","S","M","L","XL");

        if ( !array_key_exists($id, $listProducts)){
            return redirect()->route('home.index');
        }
        
        $data["title"] = $listProducts[$id]["name"];
        $data["product"] = $listProducts[$id];
        $data["sizes"] = $listOfSizes;

        
        
        return view('product.show')->with("data",$data);
    }

    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        $listOfSizes = array("XS","S","M","L","XL");

        $data["title"] = $product->getName();
        $data["product"] = $product;
        $data["sizes"] = $listOfSizes;        
        return view('product.show')->with("data",$data);
    }*/

    
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";

        return view('donation.create')->with("data",$data);
    }
    

    /*
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Product::all();

        return view('product.create')->with("data",$data);
    }*/


    //post store request????
    public function save(Request $request)
    {
        $data = [];

        $data["title"] = "Thanks for helping us and our foundations";
        $data["info"] = "We already have your data and will contact you as soon as possible";

        //$post = Post::create($storerequest->all());

        $request->validate([
            "size" => "",
            "usetime" => "",
            "deliverytype" => "",
            "date" => ""|"date",
            "description" => "",
            "photos" => ""
        ]);

        //Donation::create($request->only(["size","usetime","deliverytype","date","name","price"]));

        //image
        //if($storerequest->file('file')){
        //    $path = Storage::disk('public')->put('image', $storerequest->file('file'));
        //    $post->fill(['file'=> asset($path)])->save();
        //}

        return view('donation.save')->with("data", $data);

        //dd($request->all());
        //here goes the code to call the model and save it to the database
    }
    
    /*
    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        Product::create($request->only(["name","price"]));

        return back()->with('success','Item created successfully!');
    }
    */
}