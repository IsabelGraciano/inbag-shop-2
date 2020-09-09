<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


use App\Http\Controllers\Post;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Storage;
use App\Product;

class AdminProductController extends Controller
{   
    public function product(){
        return view('admin.product.adminOptions');
    }

    
    /* This method returns a view with all the product objects that are inserted into the database */
    public function list()
    {
        $data = []; 
        $data["title"] = "Here are the products you have done";
        $data["products"] = Product::all();

        return view('admin.product.adminList')->with("data",$data);

    }

    /* Returns a view wich creates a new product, this is the form */
    public function create()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["product"] = Product::all();

        //CAMBIAR CON RETURN BACK
        return view('admin.product.adminCreate')->with("data",$data);
    }


    /* This method shows the information of one product in specific */
    public function view($id)
    {
        $data = []; //to be sent to the view      

        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('product.list');
        }

        $data["product"] = $product;
        $data["title"] = $product->getName();
               
        return view('admin.product.adminView')->with("data",$data);
    }

    /* Saves the form with the respective data */
    public function save(Request $request)
    {

        /** Validate the form calling the method validate in the model */
        Product::validate($request);
        /* verify if the request has a file and move it to the folder */
        if($request->hasFile('file')){
            $file = $request->file('file');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/productImages/',$nameImage);
        }

        $product = new product();
        $product->setName($request->name);
        $product->setSize($request->size);
        $product->setDiscount($request->discount);
        $product->setCategory($request->category);
        $product->setDescription($request->description);
        $product->setColor($request->color);
        $product->setPrice($request->price);
        $product->setImage($nameImage);
        $product->save();

        return back()->with('success','Item created successfully!');
    }

    /* deletes a product object */
    public function delete($id)
    {
        $productDelete = Product::findOrFail($id);
        $productDelete->delete();

        return redirect()->route('admin.product.adminList');
    }
}