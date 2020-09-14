<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Donation;
use Illuminate\Support\Facades\Auth;


class UserDonationController extends Controller
{   
    public function options(){
        return view('donation.userOptions');
    }

    public function list()
    {
        $data = []; 
        $data["donations"] = Donation::all();

        return view('donation.userList')->with("data",$data);
    }

    public function create()
    {
        $data = [];
        $data["donation"] = Donation::all();

        return view('donation.userCreate')->with("data",$data);
    }

    public function viewdonation($id)
    {
        $data = []; //to be sent to the view      

        try{
            $donation = Donation::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('donation.userList');
        }

        $data["donation"] = $donation;               
        return view('donation.userViewdonation')->with("data",$data);
    }

    public function save(Request $request)
    {
        
        $data = [];

        /** Validate the form calling the method validate in the model */
        Donation::validate($request);
        /* verify if the request has a file and move it to the folder */
        if($request->hasFile('file')){
            $file = $request->file('file');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/donationImages/',$nameImage);
        }

        $donation = new Donation();
        $donation->setName($request->name);
        $donation->setSize($request->size);
        $donation->setUsetime($request->usetime);
        $donation->setDeliverytype($request->deliveryType);
        $donation->setDescription($request->description);
        $donation->setImage($nameImage);
        $customer_id = Auth::user()->id;
        $donation->setCustomerId($customer_id);
        $donation->save();

        return view('donation.userSave')->with("data", $data);
    }

    public function delete($id)
    {
        $donationDelete = Donation::findOrFail($id);
        $donationDelete->delete();
        return redirect()->route('donation.userList');
    }
}