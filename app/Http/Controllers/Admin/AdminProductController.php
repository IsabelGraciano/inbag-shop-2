<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Product;

class AdminProductController extends Controller
{   
    public function product($language){
        return view('admin.product.adminOptions');
    }

    public function list($language)
    {
        $data = []; 
        $data["products"] = Product::all();

        return view('admin.product.adminList')->with("data",$data);
    }

    public function create($language)
    {
        $data = [];
        $data["product"] = Product::all();

        return view('admin.product.adminCreate')->with("data",$data);
    }

    public function view($language, $id)
    {
        $data = []; //to be sent to the view      

        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.product.adminList', ['language' => $language]);
        }

        $data["product"] = $product;
        $data["title"] = $product->getName();
               
        return view('admin.product.adminView')->with("data",$data);
    }

    public function save(Request $request, $language)
    {
        Product::validate($request);
        $product = new product();

        if($request->hasFile('file')){
            $file = $request->file('file');
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

    public function delete($language, $id)
    {
        $productDelete = Product::findOrFail($id);
        $productDelete->delete();
        return redirect()->route('admin.product.adminList', ['language' => $language]);
    }
}