<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;

class AdminProductController extends Controller
{   
    /* This method returns a view with all the product objects that are inserted into the database */
    public function list()
    {
        $data = []; 
        $data["title"] = "Here are the products you have done";
        $data["products"] = Product::all();

        return view('product.list')->with("data",$data);

    }

    /* Returns a view wich creates a new product, this is the form */
    public function create()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["product"] = Product::all();

        return view('product.create')->with("data",$data);
    }


    /* This method shows the information of one product in specific */
    public function viewproduct($id)
    {
        $data = []; //to be sent to the view      

        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('product.list');
        }

        $data["product"] = $product;
        $data["title"] = $product->getName();
               
        return view('product.viewproduct')->with("data",$data);
    }

    /* Saves the form with the respective data */
    public function save(Request $request)
    {
        
        $data = [];
        $data["title"] = "Thanks for helping us and our foundations \n We already have your data and will contact you as soon as possible";

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
        $product->setCategoy($request->category);
        $product->setDescription($request->description);
        $product->setColor($request->color);
        $product->setPrice($request->price);
        $product->setImage($nameImage);
        $product->save();

        return view('product.save')->with("data", $data);
    }

    /* deletes a product object */
    public function delete($id)
    {
        //$data = [];
        //$data["title"] = "Your product has been deleted successfully";

        $productDelete = Product::findOrFail($id);
        $productDelete->delete();

        return redirect()->route('product.list');
    }
}