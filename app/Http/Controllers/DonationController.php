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
    /* This method returns a view with all the donation objects that are inserted into the database */
    public function view()
    {
        $data = []; 
        $data["title"] = "Here are the donations you have done";
        $data["donations"] = Donation::all();

        return view('donation.view')->with("data",$data);

    }

    /* Returns a view wich creates a new donation, this is the form */
    public function create()
    {
        $data = [];
        $data["title"] = "Create product";
        $data["donation"] = Donation::all();

        return view('donation.create')->with("data",$data);
    }


    /* This method shows the information of one donation in specific */
    public function viewdonation($id)
    {
        $data = []; //to be sent to the view
        $data["donation"] = Donation::findOrFail($id);
        $data["title"] = Donation::findOrFail($id)->getName();
               
        return view('donation.viewdonation')->with("data",$data);
    }

    /* Saves the form with the respective data */
    public function save(Request $request)
    {
        
        $data = [];
        $data["title"] = "Thanks for helping us and our foundations \n We already have your data and will contact you as soon as possible";

        $request->validate([
            "name" => 'required',
            "usetime" => 'numeric|gt:0|required',
            "description" => 'required',
            "image" => 'mimes:jpeg,bmp,png,jpg'
        ]);

        /* verify if the request has a file and move it to the folder */
        if($request->hasFile('file')){
            $file = $request->file('file');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/donationImages/',$nameImage);
        }

        $donation = new Donation();
        $donation->name = $request->input('name');
        $donation->size = $request->input('size');
        $donation->usetime = $request->input('usetime');
        $donation->deliveryType = $request->input('deliveryType');
        $donation->description = $request->input('description');
        $donation->image = $nameImage;

        $donation->save();

        return view('donation.save')->with("data", $data);
    }

    /* deletes a donation object */
    public function delete($id)
    {
        $data = [];
        $data["title"] = "Your donation has been deleted successfully";

        $donationDelete = Donation::findOrFail($id);
        $donationDelete->delete();

        return view('donation.delete')->with("data", $data);
    }
}